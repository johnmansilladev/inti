@section('title') {{ 'Carrito de compras' }} @endsection
<div>
    <section>
        <div class="max-w-[80%] mx-auto my-12">
            <div class="flex my-10 space-x-8">
                <div class="w-3/4 bg-white shadow-[0_4px_6px_4px_rgba(0,0,0,0.1),0_2px_4px_-2px_rgb(0,0,0,0.1)] rounded-lg px-10 py-10">
                    <div class="flex justify-between border-b pb-3">
                        <h1 class="font-bold text-lg text-theme-gray uppercase">Carrito de compras</h1>
                        <h2 class="font-bold text-lg text-theme-gray uppercase">{{$this->totalQuantity}} articulos</h2>
                    </div>
                    <div class="flex mt-10 mb-5">
                        <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Producto</h3>
                        <h3 class="font-semibold text-center text-theme-gray text-xs uppercase w-1/5">Cantidad</h3>
                        <h3 class="font-semibold text-center text-theme-gray text-xs uppercase w-1/5">Precio</h3>
                        <h3 class="font-semibold text-center text-theme-gray text-xs uppercase w-1/5">Total</h3>
                    </div>
                    @foreach ($cartItems as $item)
                    <div class="flex items-center hover:bg-gray-100 group -mx-8 px-6 py-5">
                        <div class="flex w-2/5">
                            <!-- product -->
                            <div class="w-20">
                                <a href="{{route('product.index',['product'=>$item->associatedModel->slug,'version'=>$item->attributes->sku_slug])}}">
                                    <img class="h-24" src="{{ Storage::url($item->attributes->sku_image) }}" alt="{{ $item->name.' - '.$item->attributes->sku_name }}">
                                </a>
                            </div>
                            <div class="flex flex-col ml-4 flex-grow">
                                <a href="{{route('product.index',['product'=>$item->associatedModel->slug,'version'=>$item->attributes->sku_slug])}}" class="font-bold text-xs uppercase">{{ $item->name.' - '.$item->attributes->sku_name  }}</a>
                                <span class="text-theme-gray font-bold text-xs capitalize mt-2">{{ $item->associatedModel->brand->name }}</span>
                                {{-- <a href="#" class="font-semibold hover:text-red-500 text-gray-500 text-xs">Remove</a> --}}
                                <div class="w-fit flex bg-theme-lwgray group-hover:bg-theme-yellow rounded-md py-2 px-3 mt-1">
                                    <a href="{{route('product.index',['product'=>$item->associatedModel->slug,'version'=>$item->attributes->sku_slug,'service'=>$item->attributes->service_slug])}}" class="text-xs font-semibold uppercase truncate">
                                        {{ $item->attributes->service_name }}
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <button type="button" wire:loading.attr="disabled"  wire:target="removeCart" wire:click="removeCart({{ $item->id }})" class="font-bold text-xs text-theme-gray underline decoration-theme-gray hover:text-red-600 hover:decoration-red-600">Eliminar</button>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center w-1/5">
                            <div class="bg-theme-yellow p-1 rounded-lg">
                                <button type="button" {{ $item->quantity <= 1 ? 'disabled' : '' }}
                                wire:loading.attr="disabled" wire:target="decrementCart" wire:click="decrementCart({{$item->id}})"
                                class="inline-flex items-center px-2.5 py-1 bg-white border border-transparent rounded-md font-semibold text-base text-theme-gray uppercase tracking-widest disabled:opacity-25 transition">
                                    -
                                </button>
                                <span class="mx-3 text-theme-gray font-bold">{{ $item->quantity }}</span>
                                <button type="button" wire:loading.attr="disabled" wire:target="incrementCart" wire:click="incrementCart({{$item->id}})" 
                                class="inline-flex items-center px-2.5 py-1 bg-white border border-transparent rounded-md font-semibold text-base text-theme-gray uppercase tracking-widest disabled:opacity-25 transition">
                                    +
                                </button>
                            </div>
                        </div>
                        <span class="text-center w-1/5 font-semibold text-sm">${{ $item->price }}</span>
                        <span class="text-center w-1/5 font-semibold text-sm">${{ number_format($item->quantity * $item->price, 2) }}</span>
                    </div>
                    @endforeach
                </div>
                <div class="w-1/4 bg-white shadow-[0_4px_6px_4px_rgba(0,0,0,0.1),0_2px_4px_-2px_rgb(0,0,0,0.1)] rounded-lg px-8 py-10">
                    <h1 class="font-semibold text-lg uppercase border-b pb-3">Resumen de carrito</h1>
                    <div class="flex justify-between border-b-2 pb-2 mt-10 mb-2">
                        <span class="font-semibold text-theme-gray text-xs uppercase">Subtotal</span>
                        <span class="font-semibold text-theme-gray text-xs">${{ $subtotal }}</span>
                    </div>
                    <div class="flex justify-between mt-4 mb-5">
                        <span class="font-bold text-theme-gray text-sm uppercase">total</span>
                        <span class="font-bold text-theme-yellow text-sm">${{ $total }}</span>
                    </div>
                    {{-- <div class="py-10">
                        <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">Promo Code</label>
                        <input type="text" id="promo" placeholder="Enter your code" class="p-2 text-sm w-full">
                    </div> --}}
                    <div class="mt-6">
                        <button role="button" class="flex items-center justify-center w-full rounded-md border border-transparent bg-theme-yellow px-6 py-2 text-sm font-bold text-theme-gray uppercase shadow hover:opacity-75">
                            Ir a comprar
                        </button>
                        <button role="button" class="flex items-center justify-center w-full mt-3 rounded-md border border-transparent bg-theme-lwgray px-6 py-2 text-sm font-bold text-theme-gray uppercase shadow hover:opacity-75">
                            Agregar más productos
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>