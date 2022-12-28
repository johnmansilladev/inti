<nav x-init="$watch(shoppingCartOpen, o => !o && window.setTimeout(() => (shoppingCartOpen = true), 1000))" x-show="shoppingCartOpen" style="display: none;" class="relative z-10"
    aria-labelledby="slide-over-title" x-ref="dialog" aria-modal="true">

    <div x-show="shoppingCartOpen" x-transition:enter="ease-in-out duration-500" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-500"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        x-description="Background backdrop, show/hide based on slide-over state."
        class="fixed inset-0 bg-theme-black bg-opacity-75 transition-opacity"></div>


    <div class="fixed inset-0 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-[420px] pl-10">

                <div x-show="shoppingCartOpen"
                    x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                    x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                    x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                    x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                    class="pointer-events-auto relative w-screen max-w-md"
                    @click.away="shoppingCartOpen = false,disabledPage()">

                    <div x-show="shoppingCartOpen" x-transition:enter="ease-in-out duration-500"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="ease-in-out duration-500" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="absolute top-0 left-0 -ml-8 flex pt-4 pr-2 sm:-ml-10 sm:pr-4">
                        <button type="button"
                            class="rounded-md text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white"
                            @click="shoppingCartOpen = false,disabledPage()">
                            <span class="sr-only">Close panel</span>
                            <svg class="h-6 w-6" x-description="Heroicon name: outline/x-mark"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                                </path>
                            </svg>
                        </button>
                    </div>

                    <div class="flex h-full flex-col  bg-white shadow-xl">
                        <div class="px-4 py-3 border-b-4 border-theme-orange">
                            <h2 class="text-lg text-center font-semibold text-theme-black" id="slide-over-cart">Mi
                                carrito</h2>
                        </div>
                        <div
                            class="flow-root overflow-auto max-h-[68%] scrollbar scrollbar-thumb-theme-orange scrollbar-track-gray-100 scrollbar-theme">
                            @if ($cartItems->count())
                                <ul role="list" class="divide-y divide-gray-200 mx-6">
                                    @foreach ($cartItems as $item)
                                        <li class="flex py-4">
                                            <div
                                                class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                <img src="{{ Storage::url('products/product-1.png') }}" alt=""
                                                    class="h-full w-full object-cover object-center">
                                            </div>

                                            <div class="ml-4 flex flex-1 flex-col">
                                                <div>
                                                    <h3 class="text-sm font-medium"><a
                                                            href="#">{{ $item->name }}</a></h3>
                                                    <p class="mt-1 text-xs text-gray-500">
                                                        {{ Str::title($item->attributes->sku_brand) }}</p>
                                                </div>

                                                <div class="bg-[#EAEAEA] p-2 rounded mt-2">
                                                    <p class="text-xs uppercase truncate">
                                                        {{ $item->attributes->service_name }}</p>
                                                </div>

                                                <div class="mt-2">
                                                    <div
                                                        class="flex justify-between text-base font-medium text-gray-900">
                                                        <p class="text-xs line-through">
                                                            {{ $item->attributes->service_currency_id }} 
                                                            {{ $item->price }}
                                                        </p>
                                                        <p class="text-xs ml-4">
                                                            {{ $item->attributes->service_currency_id }}
                                                            99.90
                                                            <span class="bg-red-600 text-white font-medium px-2 py-[2px] text-[10px] rounded pl-2">- 20%</span>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div
                                                    class="flex flex-1 items-end justify-between font-medium text-xs mt-4">
                                                    <div
                                                        class="flex flex-row w-full rounded-lg relative bg-transparent">
                                                        <button type="button"
                                                            wire:click="decrementCart({{ $item->id }})"
                                                            class="bg-theme-gray text-white w-[28px] h-[25px] rounded cursor-pointer outline-none">
                                                            <span class="m-auto text-sm font-medium">−</span>
                                                        </button>
                                                        <span type="number" name="custom-input-number"
                                                            class="text-center w-[28px] h-[25px] bg-white font-semibold text-sm border-transparent flex items-center justify-center">{{ $item->quantity }}</span>
                                                        <button type="button"
                                                            wire:click="incrementCart({{ $item->id }})"
                                                            class="bg-theme-gray text-white w-[28px] h-[25px]  rounded cursor-pointer">
                                                            <span class="m-auto text-sm font-medium">+</span>
                                                        </button>
                                                    </div>
                                                    <div class="flex">
                                                        <button type="button"
                                                            wire:click="removeCart({{ $item->id }})"
                                                            class="flex text-theme-orange">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-4 h-4">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                            </svg>
                                                            Eliminar
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
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
                                        categorías y descubre todo lo que tenemos para ti.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="bg-white border-t-2 border-theme-orange py-6 mx-6 mt-auto">
                        <div class="flex justify-between text-base font-semibold text-gray-900">
                            <p>Total:</p>
                            <p>USD {{ Cart::getSubTotal() }}</p>
                        </div>
                        <div class="mt-4">
                            <a href="#"
                                class="flex items-center justify-center rounded-md border border-transparent  bg-theme-gray px-6 py-2 text-base font-medium text-white shadow-sm">Ir
                                a comprar</a>
                        </div>
                        <div class="flex justify-center text-center text-sm text-theme-black mt-4">
                            <button type="button" class="font-medium text-theme-orange"
                                @click="shoppingCartOpen = false">
                                Seguir comprando
                                <span aria-hidden="true"> →</span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</nav>
