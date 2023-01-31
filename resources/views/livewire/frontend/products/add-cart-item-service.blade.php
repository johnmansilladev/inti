<div x-data>
    <div class="flex flex-col mt-6">
      
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

            <div class="flex justify-between items-center">
                <p class="text-base font-medium text-theme-gray">Normal</p>
                <p class="text-base font-medium text-theme-gray line-through">S/. {{ number_format($base_price,2) }}</p>
            </div>
            <div class="flex justify-between items-center pt-1">
                <p class="text-sm font-semibold text-red-500">Oferta</p>
                <div class="flex justify-center items-center">
                    @if ($promotion->type_promotion == 1)
                    <span class="bg-[#FF0000] rounded-lg text-xs font-semibold text-white px-2 mr-2">-{{number_format($promotion->discount_rate)}}%</span>
                    @endif
                    <p class="text-sm font-semibold text-red-500">S/. {{ number_format($sale_price,2) }}</p>
                </div>
            </div>
        @else
            <div class="flex justify-between items-center">
                <p class="text-sm font-medium text-theme-gray">Normal</p>
                <p class="text-sm font-medium text-theme-gray">S/. {{  number_format($service_selected->pivot->base_price,2) }}
                </p>
            </div>
        @endif
    </div>
    <div class="mt-6">
            <label class="form-label mb-1">Versión:</label>
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" type="button"
                    class="bg-white relative w-full border border-theme-lgray rounded-md shadow-sm pl-3 pr-10 py-2.5 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-transparent sm:text-sm"
                    aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                    <span class="text-sm block truncate uppercase">{{ $sku_selected->name }}</span>
                    <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </span>
                </button>
                <ul x-show="open"
                    class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-56 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm"
                    tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-3"
                    @click.outside="open = false" :hidden="!open">
        
                    @foreach ($product->stockKeepingUnits->where('active',1) as $sku)
                        <li class="text-theme-gray cursor-default select-none relative py-2 px-6 border-l-4 border-l-transparent hover:border-l-4 hover:border-l-theme-orange hover:bg-theme-lwgray hover:cursor-pointer"
                            id="listbox-option-0" @click.outside="open = false" role="option"
                            wire:click="updateSkuSelected({{ $sku->id }})">
                            <span class="text-sm font-normal block uppercase">{{ $sku->name }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div x-data="{ open: false }" class="relative mt-4">
                <label class="form-label mb-1">Servicio:</label>
                <button @click="open = !open" type="button"
                    class="bg-white relative w-full border border-theme-lgray rounded-md shadow-sm pl-3 pr-10 py-2.5 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-transparent sm:text-sm"
                    aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                    <span class="text-sm block truncate uppercase">{{ $service_selected->name }}</span>
                    <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </span>
                </button>
                <ul x-show="open"
                    class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-56 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-none focus:outline-none sm:text-sm"
                    tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-3"
                    @click.outside="open = false" :hidden="!open">
        
                    @foreach ($sku_selected->services as $service)
                        <li class="text-theme-gray cursor-default select-none relative py-2 pl-6 pr-9 border-l-4 border-l-transparent hover:border-l-4 hover:border-l-theme-orange hover:bg-theme-lwgray hover:cursor-pointer"
                            id="listbox-option-0" @click="open = false" role="option"
                            wire:click="updateServiceSelected({{ $service->id }})">
                            <span class="text-sm font-normal block uppercase">{{ $service->name }}</span>
                            <span class="text-theme-orange absolute inset-y-0 right-0 flex items-center pr-4">
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="flex mt-4">
                <div class="flex items-center bg-theme-yellow px-2 rounded-lg disabled:opacity-25">
                    <button type="button" disabled x-bind:disabled="$wire.qty <= 1" wire:loading.attr="disabled" 
                    wire:target="decrement" wire:click="decrement"
                    class="inline-flex items-center px-2.5 py-1 bg-white border border-transparent rounded-md font-semibold text-base text-theme-gray uppercase tracking-widest disabled:opacity-25 transition">
                        −
                    </button>
                    <span class="mx-4 text-theme-gray font-bold">{{ $qty }}</span>
                    <button type="button" wire:loading.attr="disabled" wire:target="increment" wire:click="increment" 
                    class="inline-flex items-center px-2.5 py-1 bg-white border border-transparent rounded-md font-semibold text-base text-theme-gray uppercase tracking-widest disabled:opacity-25 transition">
                        +
                    </button>
                </div>
                <div class="flex-1 ml-4">
                    <button wire:click="addServiceItemCart" wire:loading.attr="disabled" wire:target="addServiceItemCart"
                    class="inline-flex justify-center bg-theme-gray rounded-md border border-transparent py-2.5 w-full text-sm font-bold text-white shadow-sm focus:outline-none uppercase transition duration-500">Agregar al Carrito</button>
                </div>
            </div>
    </div>
</div>
