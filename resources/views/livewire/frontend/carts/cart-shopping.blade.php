@section('title') {{ 'Carrito de compras' }} @endsection
<div>
    <section>
        <div class="max-w-[80%] mx-auto my-12">
            <div class="flex my-10 space-x-8">
                <div class="w-3/4 bg-white shadow-[0_4px_6px_4px_rgba(0,0,0,0.1),0_2px_4px_-2px_rgb(0,0,0,0.1)] rounded-lg px-10 py-10">
                    <div class="flex justify-between border-b pb-3">
                        <h1 class="font-bold text-lg text-theme-gray uppercase">Carrito de compras</h1>
                        <h2 class="font-bold text-lg text-theme-gray uppercase">{{$totalQuantity}} articulos</h2>
                    </div>
                    <div class="flex mt-10 mb-5">
                        <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Producto</h3>
                        <h3 class="font-semibold text-center text-theme-gray text-xs uppercase w-1/5">Cantidad</h3>
                        <h3 class="font-semibold text-center text-theme-gray text-xs uppercase w-1/5">Precio</h3>
                        <h3 class="font-semibold text-center text-theme-gray text-xs uppercase w-1/5">Total</h3>
                    </div>
                    @if ($cartItems->count())
                        @foreach ($cartItems as $item)
                        <div class="flex items-center hover:bg-gray-100 group -mx-8 px-6 py-5  {{ !$loop->last ? 'border-b' : '' }}">
                            <div class="flex w-2/5">
                                <!-- product -->
                                <div class="w-24">
                                    <a href="{{ route('product.index',['product'=>$item->options->product_slug,'version'=>$item->options->sku_slug]) }}" class="relative">
                                        <img class="h-auto" src="{{ Storage::url($item->options->sku_image) }}" alt="{{ $item->name.' - '.$item->options->sku_name }}">
                                        @if ($item->options->service_dcto > 0)
                                        <div class="absolute top-2 left-2">
                                            <div class="flex justify-center items-center bg-[#FF0000] rounded-lg drop-shadow-3xl px-2">
                                                <span class="text-[10px] font-bold text-white">-{{ number_format($item->options->service_dcto) }}%</span>
                                            </div>
                                        </div>
                                        @endif
                                    </a>
                                </div>
                                <div class="flex flex-col ml-4 flex-grow">
                                    <a href="{{ route('product.index',['product'=>$item->options->product_slug,'version'=>$item->options->sku_slug]) }}" class="font-bold text-xs uppercase">{{ $item->name.' - '.$item->options->sku_name  }}</a>
                                    <span class="text-theme-gray font-bold text-xs capitalize mt-2">{{ $item->options->sku_brand }}</span>
                                    <div class="w-fit flex bg-theme-lwgray group-hover:bg-theme-yellow rounded-md py-2 px-3 mt-2">
                                        <a href="{{ route('product.index',['product'=>$item->options->product_slug,'version'=>$item->options->sku_slug,'service'=>$item->options->service_slug]) }}" class="text-xs font-semibold uppercase truncate">
                                            {{ $item->options->service_name }}
                                        </a>
                                    </div>
                                    <div class="mt-2">
                                        <button type="button" wire:loading.attr="disabled"  wire:target="removeCart" wire:click="removeCart('{{ $item->rowId }}')" class="font-bold text-xs text-theme-gray underline decoration-theme-gray hover:text-red-600 hover:decoration-red-600 cursor-pointer">Eliminar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-center w-1/5">
                                <div class="bg-theme-yellow p-1 rounded-lg">
                                    <button type="button" {{ $item->qty <= 1 ? 'disabled' : '' }}
                                    wire:loading.attr="disabled" wire:target="decrementCart" wire:click="decrementCart('{{$item->rowId}}')"
                                    class="inline-flex items-center px-2.5 py-1 bg-white border border-transparent rounded-md font-semibold text-base text-theme-gray uppercase tracking-widest disabled:opacity-25 transition">
                                        -
                                    </button>
                                    <span class="mx-3 text-theme-gray font-bold">{{ $item->qty }}</span>
                                    <button type="button" wire:loading.attr="disabled" wire:target="incrementCart" wire:click="incrementCart('{{$item->rowId}}')" 
                                    class="inline-flex items-center px-2.5 py-1 bg-white border border-transparent rounded-md font-semibold text-base text-theme-gray uppercase tracking-widest disabled:opacity-25 transition">
                                        +
                                    </button>
                                </div>
                            </div>
                            <div class="flex flex-col justify-center items-center w-1/5">
                                @if ($item->options->service_dcto > 0 || $item->price < $item->options->service_price)
                                    <div class="flex text-center font-medium text-sm">S/. {{ number_format($item->price,2) }}</div>
                                    <div class="flex text-center font-medium text-sm line-through">S/. {{  number_format($item->options->service_price,2) }}</div>
                                @else
                                    <div class="flex text-center font-medium text-sm">S/. {{ number_format($item->price,2) }}</div>
                                @endif
                            </div>
                            <span class="text-center w-1/5 font-semibold text-sm">S/. {{ number_format($item->total, 2) }}</span>
                        </div>
                        @endforeach
                    @else
                        <div class="flex items-center -mx-8 px-6 py-5">
                            <div class="flex flex-col justify-center items-center text-center m-auto">
                                <div class="mb-4">
                                    <svg class="w-10 h-10" viewBox="0 0 45 45" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_277_64)">
                                            <path class="fill-theme-gray" d="M22.45 7.3974e-06C10.02 0.0200074 -0.0400032 10.15 -3.19835e-06 22.6C0.0399968 34.86 10.15 44.97 22.42 45C34.81 45.03 45 34.88 45 22.5C45 10.12 34.89 -0.0099926 22.45 7.3974e-06ZM33.21 39.98C32.74 40.46 31.98 40.81 30.77 41.26C28.24 42.38 25.44 43 22.5 43C11.18 43 2 33.82 2 22.5C2 11.18 11.18 2.00001 22.5 2.00001C33.82 2.00001 43 11.18 43 22.5C43 29.89 39.08 36.38 33.21 39.98Z" fill="black"></path>
                                            <path class="fill-theme-gray" d="M16.85 38.45C16.36 38.27 15.84 38.16 15.4 37.9C13.72 36.91 13.18 34.81 14.12 33.09C14.17 32.99 14.22 32.89 14.3 32.76C14.15 32.74 14.03 32.72 13.91 32.71C12.4 32.54 11.34 31.36 11.34 29.84C11.34 23.35 11.34 16.85 11.34 10.36C11.34 9.99 11.24 9.82 10.9 9.68C9.55001 9.13 8.22001 8.55 6.88001 7.98C6.39001 7.77 6.21001 7.43 6.37001 7.02C6.53001 6.61 6.96001 6.44 7.43001 6.63C9.06001 7.31 10.68 8.01 12.31 8.69C12.65 8.83 12.8 9.08 12.8 9.45C12.79 10.26 12.81 11.06 12.79 11.87C12.78 12.22 12.87 12.35 13.24 12.4C19.08 13.28 24.92 14.18 30.75 15.08C32.23 15.31 33.71 15.55 35.19 15.75C35.66 15.81 35.98 16 36.13 16.46V24.53C36.13 24.53 36.08 24.57 36.08 24.59C35.69 26.41 34.74 27.18 32.88 27.18C26.87 27.18 20.86 27.18 14.84 27.18C14.19 27.18 13.54 27.05 12.86 26.98C12.86 27.77 12.86 28.67 12.86 29.57C12.86 30.72 13.37 31.23 14.51 31.23C20.18 31.23 25.85 31.23 31.53 31.23C31.85 31.23 32.18 31.22 32.5 31.27C34.51 31.57 35.87 33.46 35.51 35.43C35.15 37.42 33.27 38.73 31.32 38.35C29.29 37.95 28.02 36.02 28.5 34C28.6 33.57 28.81 33.17 28.97 32.75H20.24C20.32 32.89 20.37 32.99 20.42 33.09C21.53 35.11 20.51 37.62 18.3 38.3C18.1 38.36 17.91 38.42 17.71 38.48H16.86L16.85 38.45ZM12.88 13.79C12.86 13.91 12.85 13.99 12.85 14.08C12.85 17.5 12.85 20.93 12.85 24.35C12.85 25.15 13.45 25.73 14.26 25.73C20.57 25.73 26.88 25.73 33.19 25.73C34.02 25.73 34.62 25.16 34.63 24.33C34.64 22.04 34.63 19.75 34.63 17.45C34.63 17.19 34.53 17.11 34.3 17.07C32.22 16.76 30.14 16.44 28.06 16.12C24.11 15.51 20.16 14.9 16.2 14.3C15.1 14.13 14 13.96 12.88 13.79ZM31.94 36.92C33.12 36.92 34.08 35.95 34.07 34.79C34.07 33.64 33.08 32.68 31.91 32.69C30.74 32.69 29.76 33.68 29.77 34.82C29.77 35.96 30.78 36.93 31.94 36.92ZM15.11 34.83C15.11 35.98 16.12 36.94 17.29 36.92C18.44 36.9 19.41 35.93 19.4 34.8C19.4 33.65 18.41 32.68 17.24 32.69C16.06 32.69 15.11 33.65 15.12 34.83H15.11Z" fill="black"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_277_64">
                                                <rect width="45" height="45" fill="black"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <p class="text-sm text-theme-gray mb-2">¡Tu carrito de compras esta vacío!</p>
                                <p class="text-sm text-theme-gray">
                                    Para seguir comprando, navega por nuestras
                                    categorías y descubre todo lo que tenemos para ti.</p>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="w-1/4 bg-white shadow-[0_4px_6px_4px_rgba(0,0,0,0.1),0_2px_4px_-2px_rgb(0,0,0,0.1)] h-fit rounded-lg px-8 py-10">
                    <h1 class="font-semibold text-lg uppercase border-b pb-3">Resumen de la orden</h1>
                    <div class="flex justify-between border-b-2 pb-2 mt-10 mb-2">
                        <span class="font-semibold text-theme-gray text-xs uppercase">Subtotal</span>
                        <span class="font-semibold text-theme-gray text-xs">${{ $subtotal }}</span>
                    </div>
                    <div class="flex justify-between mt-4 mb-5">
                        <span class="font-bold text-theme-gray text-sm uppercase">total</span>
                        <span class="font-bold text-theme-yellow text-sm">${{ $total }}</span>
                    </div>
                    <div class="mt-10">
                        <a href="{{ route('checkout') }}"  class="flex items-center justify-center w-full rounded-md border border-transparent px-6 py-2 text-sm font-bold text-theme-gray uppercase shadow hover:opacity-75 {{ $totalQuantity<=0 ? 'pointer-events-none bg-theme-lwgray opacity-75' : 'bg-theme-yellow' }}">
                            Ir a comprar
                        </a>
                        <a href="{{ route('shop',['shop_section' => 'categories','shop_section_url'=> '']) }}" class="flex items-center justify-center w-full mt-3 rounded-md border border-transparent bg-theme-lwgray px-6 py-2 text-sm font-bold text-theme-gray uppercase shadow hover:opacity-75">
                            Agregar más productos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>