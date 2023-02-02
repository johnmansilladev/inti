<div x-data="{open: @entangle('showModalQuickviews')}" x-init="$watch('open', toggleOverflow)" class="relative z-20"  x-ref="dialog" aria-modal="true"  x-show="open" style="display: none">
    <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
    class="fixed inset-0 hidden bg-black bg-opacity-75 transition-opacity md:block"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-stretch justify-center text-center md:items-center md:px-2 lg:px-4">
            <div x-show="open" @click.away="open = false"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 md:translate-y-0 md:scale-95" x-transition:enter-end="opacity-100 translate-y-0 md:scale-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 md:scale-100" x-transition:leave-end="opacity-0 translate-y-4 md:translate-y-0 md:scale-95"  
            class="flex w-full transform text-left text-base transition md:my-8 md:max-w-2xl md:px-4 lg:max-w-3xl">
                <div class="relative flex w-full items-center overflow-hidden bg-white px-4 pt-14 pb-8 shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8 md:rounded-lg">
                    <button  @click="open = false" type="button"
                        class="absolute top-4 right-4 text-gray-400 hover:text-gray-500 sm:top-8 sm:right-6 md:top-6 md:right-6 lg:top-8 lg:right-8">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    @if (!empty($product))
                    <div class="grid w-full grid-cols-1 items-start gap-y-8 gap-x-6 md:grid-cols-12 lg:gap-x-8">
                        <div class="modal-image-product-preview row">
                            <div class="aspect-w-2 aspect-h-3 overflow-hidden rounded-lg bg-gray-100 w-full">
                            {{-- <div class="main-img-product"> --}}
                                <img src="{{ Storage::url($product->stockKeepingUnits->first()->images->first()->url) }}" alt="{{ $product->name }}" class="object-cover object-center">
                            </div>
                            {{-- <div class="carousel-img-product">
                                @foreach ($product->stockKeepingUnits->first()->images as $image)
                                <div class="carousel-img-product-item">
                                    <a href="">
                                        <img src="{{ Storage::url($image->url) }}" title="{{ $product->name }}" alt="{{ $product->name }}">
                                    </a>
                                </div>
                                @endforeach
                                
                            </div> --}}
                        </div>
                        <div class="modal-detail-product-preview">
                            <p class="text-xl font-bold text-theme-gray uppercase">{{ $product->brand->name }}</p>
                            <h2 class="text-2xl font-bold text-black uppercase mt-1">{{ $product->name }}</h2>

                            <section aria-labelledby="information-heading" class="mt-2">
                                <h3 id="information-heading" class="sr-only">Product information</h3>
                                @if (!empty($service_selected->pivot))
                                <div class="flex items-end">
                                    @if ($sku_selected->hasPromotionsService($service_selected->id))
                                        @php
                                            $promotion = $sku_selected->discountedPriceService($service_selected->id);  
                                            $base_price = $service_selected->pivot->base_price;
                                                
                                            if ($promotion->type_promotion == 1) {
                                                $sale_price = round($base_price - (($base_price * $promotion->discount_rate) / 100),1);
                                            }else {
                                                $sale_price = round($base_price - $promotion->discount_rate,1);
                                            }
                                        @endphp
                                        <p class="text-2xl font-bold text-theme-yellow mr-3">S/. {{ $sale_price }}</p> 
                                        <p class="text-lg font-bold text-theme-gray line-through">S/. {{ $base_price }}</p> 
                                    @else
                                        <p class="text-2xl font-bold text-theme-yellow mr-3">S/. {{$service_selected->pivot->base_price }}</p> 
                                    @endif
                                </div>
                                @endif
                                <div class="mt-2">
                                    <p class="text-sm text-justify">{{ $product->description_short }}</p>
                                </div>
                            </section>

                            <section>
                                <div class="flex flex-col space-y-3">
                                    <div class="w-full mt-2">
                                        <label for="version" class="form-label">Versión</label>
                                        <select id="version" wire:model="sku_id" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-theme-yellow focus:outline-none focus:ring-theme-yellow text-sm truncate uppercase">
                                            @foreach ($product->stockKeepingUnits as $sku)
                                                <option value="{{ $sku->id }}">{{ $sku->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="w-full mt-2">
                                        <label for="service" class="form-label">Servicio</label>
                                        <select id="service" wire:model="service_id" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-theme-yellow focus:outline-none focus:ring-theme-yellow text-sm truncate uppercase">
                                            @foreach ($sku_selected->services as $service)
                                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="flex space-x-2 mt-3">
                                    <a href="{{ route('product.index',$product->slug) }}" class="inline-flex justify-center bg-theme-yellow rounded-md border border-transparent py-2.5 w-full text-sm font-bold text-theme-gray shadow-sm focus:outline-none uppercase hover:opacity-75 transition duration-500">Ver Detalle</a>
                                    <button wire:click="addItemCart" wire:loading.attr="disabled" wire:target="addItemCart" class="inline-flex justify-center bg-theme-yellow rounded-md border border-transparent py-2.5 w-full text-sm font-bold text-theme-gray shadow-sm focus:outline-none uppercase hover:opacity-75 transition duration-500">Agregar al Carrito</button>
                                </div>
                            </section>
                        </div>  
                       
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
