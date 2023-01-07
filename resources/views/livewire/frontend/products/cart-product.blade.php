<nav x-data="{open: @entangle('showSidebarCart')}" x-init="$watch('open', toggleOverflow)"  class="relative z-10" aria-labelledby="slide-over-title" x-ref="dialog" aria-modal="true" x-show="open" style="display: none">

    <div x-show="open" x-transition:enter="ease-in-out" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
    class="fixed inset-0 bg-black bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
        <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">

            <div x-show="open" @click.away="open = false"
                x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" 
                class="pointer-events-auto w-screen max-w-sm">
                <div class="flex h-full flex-col bg-white shadow-xl">
                    <div class="border-b border-gray-200 py-3 px-5">
                        <div class="flex flex-row items-center justify-between">
                            <h2 class="text-lg font-extrabold text-theme-gray uppercase" id="slide-over-title">Mi Carrito</h2>
                            <p class="text-xs text-theme-gray">( {{ $totalQuantity }} {{ $totalQuantity>1 ? 'articulos': 'articulo' }} )</p>
                            {{-- <div class="ml-3 flex h-7 items-center">
                            <button type="button" @click="open = false" class="-m-2 p-2 text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Close panel</span>
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                            </div> --}}
                        </div>
                    </div>
                    <div class="flex-1 overflow-y-auto scrollbar scrollbar-thumb-theme-yellow scrollbar-track-gray-100 scrollbar-theme px-4">
                        @if ($cartItems->count())
                        <div class="mt-8">
                            <div class="flow-root">
                                <ul role="list" class="-my-6 divide-y divide-gray-200 space-y-3">
                                    @foreach ($cartItems as $item)
                                    <li class="bg-theme-swhite rounded-md shadow-md">
                                        <div class="flex p-2">
                                            <div class="w-[30%] overflow-hidden rounded-md border border-gray-200">
                                                <a href="{{ route('product.index',['product'=>$item->attributes->product_slug,'version'=>$item->attributes->sku_slug,'service'=>$item->attributes->service_slug]) }}">
                                                    <img src="{{ Storage::url($item->attributes->sku_image) }}" alt="{{ $item->name }}" class="w-full h-auto object-cover object-center">
                                                </a>
                                            </div>
                        
                                            <div class="pl-4 flex flex-col w-[70%]">
                                                <div>
                                                    <h3 class="text-xs font-bold text-theme-gray uppercase"><a href="#">{{ $item->name.' - '.$item->attributes->sku_name }}</a></h3>
                                                    <p class="mt-1 text-xs text-theme-gray">{{ Str::title($item->attributes->sku_brand) }}</p>
                                                </div>
                                                <div class="my-2">
                                                        <div class="flex bg-theme-lgray3 p-2 rounded mb-2">
                                                            <p class="flex-1 text-xs font-semibold uppercase truncate">{{ $item->attributes->service_name }}</p>
                                                            <button type="button"  wire:click="removeCart({{ $item->id }})" class="text-theme-gray">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                                class="w-4 h-4">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <div class="flex items-center justify-between">
                                                            <p class="text-sm text-theme-gray font-semibold">
                                                               $ {{ number_format($item->price *  $item->quantity,2)}}
                                                            </p>
                                                            
                                                            <div class="w-fit bg-theme-yellow p-1 rounded-md">
                                                                <button type="button" wire:click="decrementCart({{ $item->id }})"
                                                                class="inline-flex items-center px-1.5 py-1 bg-white border border-transparent rounded-md font-semibold text-xs text-theme-gray uppercase tracking-widest disabled:opacity-25 transition">
                                                                    −
                                                                </button>
                                                                <span class="mx-2 text-theme-gray text-xs font-semibold">{{ $item->quantity }}</span>
                                                                <button type="button" wire:click="incrementCart({{ $item->id }})"
                                                                class="inline-flex items-center px-1.5 py-1 bg-white border border-transparent rounded-md font-semibold text-xs text-theme-gray uppercase tracking-widest disabled:opacity-25 transition">
                                                                    +
                                                                </button>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @else
                        <div class="flex items-center justify-center h-full">
                            <div class="flex flex-col justify-center items-center text-center m-auto">
                                <div class="mb-4">
                                    <svg class="w-10 h-10" viewBox="0 0 45 45" fill="#fff"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_277_64)">
                                            <path class="fill-theme-gray"
                                                d="M22.45 7.3974e-06C10.02 0.0200074 -0.0400032 10.15 -3.19835e-06 22.6C0.0399968 34.86 10.15 44.97 22.42 45C34.81 45.03 45 34.88 45 22.5C45 10.12 34.89 -0.0099926 22.45 7.3974e-06ZM33.21 39.98C32.74 40.46 31.98 40.81 30.77 41.26C28.24 42.38 25.44 43 22.5 43C11.18 43 2 33.82 2 22.5C2 11.18 11.18 2.00001 22.5 2.00001C33.82 2.00001 43 11.18 43 22.5C43 29.89 39.08 36.38 33.21 39.98Z"
                                                fill="black" />
                                            <path class="fill-theme-gray"
                                                d="M16.85 38.45C16.36 38.27 15.84 38.16 15.4 37.9C13.72 36.91 13.18 34.81 14.12 33.09C14.17 32.99 14.22 32.89 14.3 32.76C14.15 32.74 14.03 32.72 13.91 32.71C12.4 32.54 11.34 31.36 11.34 29.84C11.34 23.35 11.34 16.85 11.34 10.36C11.34 9.99 11.24 9.82 10.9 9.68C9.55001 9.13 8.22001 8.55 6.88001 7.98C6.39001 7.77 6.21001 7.43 6.37001 7.02C6.53001 6.61 6.96001 6.44 7.43001 6.63C9.06001 7.31 10.68 8.01 12.31 8.69C12.65 8.83 12.8 9.08 12.8 9.45C12.79 10.26 12.81 11.06 12.79 11.87C12.78 12.22 12.87 12.35 13.24 12.4C19.08 13.28 24.92 14.18 30.75 15.08C32.23 15.31 33.71 15.55 35.19 15.75C35.66 15.81 35.98 16 36.13 16.46V24.53C36.13 24.53 36.08 24.57 36.08 24.59C35.69 26.41 34.74 27.18 32.88 27.18C26.87 27.18 20.86 27.18 14.84 27.18C14.19 27.18 13.54 27.05 12.86 26.98C12.86 27.77 12.86 28.67 12.86 29.57C12.86 30.72 13.37 31.23 14.51 31.23C20.18 31.23 25.85 31.23 31.53 31.23C31.85 31.23 32.18 31.22 32.5 31.27C34.51 31.57 35.87 33.46 35.51 35.43C35.15 37.42 33.27 38.73 31.32 38.35C29.29 37.95 28.02 36.02 28.5 34C28.6 33.57 28.81 33.17 28.97 32.75H20.24C20.32 32.89 20.37 32.99 20.42 33.09C21.53 35.11 20.51 37.62 18.3 38.3C18.1 38.36 17.91 38.42 17.71 38.48H16.86L16.85 38.45ZM12.88 13.79C12.86 13.91 12.85 13.99 12.85 14.08C12.85 17.5 12.85 20.93 12.85 24.35C12.85 25.15 13.45 25.73 14.26 25.73C20.57 25.73 26.88 25.73 33.19 25.73C34.02 25.73 34.62 25.16 34.63 24.33C34.64 22.04 34.63 19.75 34.63 17.45C34.63 17.19 34.53 17.11 34.3 17.07C32.22 16.76 30.14 16.44 28.06 16.12C24.11 15.51 20.16 14.9 16.2 14.3C15.1 14.13 14 13.96 12.88 13.79ZM31.94 36.92C33.12 36.92 34.08 35.95 34.07 34.79C34.07 33.64 33.08 32.68 31.91 32.69C30.74 32.69 29.76 33.68 29.77 34.82C29.77 35.96 30.78 36.93 31.94 36.92ZM15.11 34.83C15.11 35.98 16.12 36.94 17.29 36.92C18.44 36.9 19.41 35.93 19.4 34.8C19.4 33.65 18.41 32.68 17.24 32.69C16.06 32.69 15.11 33.65 15.12 34.83H15.11Z"
                                                fill="black" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_277_64">
                                                <rect width="45" height="45" fill="black" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <p class="text-sm text-theme-gray mb-2">¡Tu carrito de compras esta vacío!</p>
                                <p class="text-sm text-theme-gray">Para seguir comprando, navega por nuestras
                                    categorías
                                    y descubre todo lo que tenemos para ti.</p>
                            </div>
                        </div>
                        @endif
                    </div>
        
                    <div class="border-t border-gray-200 py-6 px-5">
                        <div class="flex justify-between text-base font-bold text-theme-gray uppercase">
                            <p>Total:</p>
                            <p>USD 0.00</p>
                        </div>
                        <div class="mt-6 space-y-3">
                            <a role="button" @click="open = false" class="flex items-center justify-center rounded-md border border-transparent bg-theme-lwgray px-6 py-2 text-sm font-bold text-theme-gray uppercase shadow hover:opacity-75">
                                Seguir viendo
                            </a>
                            <a href="#" class="flex items-center justify-center rounded-md border border-transparent bg-theme-gray px-6 py-2 text-sm font-medium text-white uppercase shadow hover:opacity-75">
                                Comprar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </div>
</nav>