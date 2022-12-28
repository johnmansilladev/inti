<div x-data="{
    menuOpen: false,
    mobileMenuOpen: false,
    shoppingCartOpen: false,
    menuNivel1: @entangle('menuNivel1'),
    menuNivel2: @entangle('menuNivel2')
}" @keydown.window.escape="menuOpen = false" class="bg-white sticky top-0" style="z-index: 9999;">
    {{-- <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
      <div class="fixed inset-0 bg-black bg-opacity-25"></div>
  
      <div class="fixed inset-0 z-40 flex">
        <div class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl">
          <div class="flex px-4 pt-5 pb-2">
            <button type="button" class="-m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400">
              <span class="sr-only">Close menu</span>
              <!-- Heroicon name: outline/x-mark -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
  
          <!-- Links -->
          <div class="mt-2">
            <div class="border-b border-gray-200">
              <div class="-mb-px flex space-x-8 px-4" aria-orientation="horizontal" role="tablist">
                <!-- Selected: "text-indigo-600 border-indigo-600", Not Selected: "text-gray-900 border-transparent" -->
                <button id="tabs-1-tab-1" class="text-gray-900 border-transparent flex-1 whitespace-nowrap border-b-2 py-4 px-1 text-base font-medium" aria-controls="tabs-1-panel-1" role="tab" type="button">Women</button>
  
                <!-- Selected: "text-indigo-600 border-indigo-600", Not Selected: "text-gray-900 border-transparent" -->
                <button id="tabs-1-tab-2" class="text-gray-900 border-transparent flex-1 whitespace-nowrap border-b-2 py-4 px-1 text-base font-medium" aria-controls="tabs-1-panel-2" role="tab" type="button">Men</button>
              </div>
            </div>
  
            <!-- 'Women' tab panel, show/hide based on tab state. -->
            <div id="tabs-1-panel-1" class="space-y-10 px-4 pt-10 pb-8" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
              <div class="grid grid-cols-2 gap-x-4">
                <div class="group relative text-sm">
                  <div class="aspect-w-1 aspect-h-1 overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg" alt="Models sitting back to back, wearing Basic Tee in black and bone." class="object-cover object-center">
                  </div>
                  <a href="#" class="mt-6 block font-medium text-gray-900">
                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                    New Arrivals
                  </a>
                  <p aria-hidden="true" class="mt-1">Shop now</p>
                </div>
  
                <div class="group relative text-sm">
                  <div class="aspect-w-1 aspect-h-1 overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg" alt="Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees." class="object-cover object-center">
                  </div>
                  <a href="#" class="mt-6 block font-medium text-gray-900">
                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                    Basic Tees
                  </a>
                  <p aria-hidden="true" class="mt-1">Shop now</p>
                </div>
              </div>
  
              <div>
                <p id="women-clothing-heading-mobile" class="font-medium text-gray-900">Clothing</p>
                <ul role="list" aria-labelledby="women-clothing-heading-mobile" class="mt-6 flex flex-col space-y-6">
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Tops</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Dresses</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Pants</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Denim</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Sweaters</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">T-Shirts</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Jackets</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Activewear</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Browse All</a>
                  </li>
                </ul>
              </div>
  
              <div>
                <p id="women-accessories-heading-mobile" class="font-medium text-gray-900">Accessories</p>
                <ul role="list" aria-labelledby="women-accessories-heading-mobile" class="mt-6 flex flex-col space-y-6">
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Watches</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Wallets</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Bags</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Sunglasses</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Hats</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Belts</a>
                  </li>
                </ul>
              </div>
  
              <div>
                <p id="women-brands-heading-mobile" class="font-medium text-gray-900">Brands</p>
                <ul role="list" aria-labelledby="women-brands-heading-mobile" class="mt-6 flex flex-col space-y-6">
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Full Nelson</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">My Way</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Re-Arranged</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Counterfeit</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Significant Other</a>
                  </li>
                </ul>
              </div>
            </div>
  
            <!-- 'Men' tab panel, show/hide based on tab state. -->
            <div id="tabs-1-panel-2" class="space-y-10 px-4 pt-10 pb-8" aria-labelledby="tabs-1-tab-2" role="tabpanel" tabindex="0">
              <div class="grid grid-cols-2 gap-x-4">
                <div class="group relative text-sm">
                  <div class="aspect-w-1 aspect-h-1 overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                    <img src="https://tailwindui.com/img/ecommerce-images/product-page-04-detail-product-shot-01.jpg" alt="Drawstring top with elastic loop closure and textured interior padding." class="object-cover object-center">
                  </div>
                  <a href="#" class="mt-6 block font-medium text-gray-900">
                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                    New Arrivals
                  </a>
                  <p aria-hidden="true" class="mt-1">Shop now</p>
                </div>
  
                <div class="group relative text-sm">
                  <div class="aspect-w-1 aspect-h-1 overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                    <img src="https://tailwindui.com/img/ecommerce-images/category-page-02-image-card-06.jpg" alt="Three shirts in gray, white, and blue arranged on table with same line drawing of hands and shapes overlapping on front of shirt." class="object-cover object-center">
                  </div>
                  <a href="#" class="mt-6 block font-medium text-gray-900">
                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                    Artwork Tees
                  </a>
                  <p aria-hidden="true" class="mt-1">Shop now</p>
                </div>
              </div>
  
              <div>
                <p id="men-clothing-heading-mobile" class="font-medium text-gray-900">Clothing</p>
                <ul role="list" aria-labelledby="men-clothing-heading-mobile" class="mt-6 flex flex-col space-y-6">
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Tops</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Pants</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Sweaters</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">T-Shirts</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Jackets</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Activewear</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Browse All</a>
                  </li>
                </ul>
              </div>
  
              <div>
                <p id="men-accessories-heading-mobile" class="font-medium text-gray-900">Accessories</p>
                <ul role="list" aria-labelledby="men-accessories-heading-mobile" class="mt-6 flex flex-col space-y-6">
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Watches</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Wallets</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Bags</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Sunglasses</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Hats</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Belts</a>
                  </li>
                </ul>
              </div>
  
              <div>
                <p id="men-brands-heading-mobile" class="font-medium text-gray-900">Brands</p>
                <ul role="list" aria-labelledby="men-brands-heading-mobile" class="mt-6 flex flex-col space-y-6">
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Re-Arranged</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Counterfeit</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">Full Nelson</a>
                  </li>
  
                  <li class="flow-root">
                    <a href="#" class="-m-2 block p-2 text-gray-500">My Way</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
  
          <div class="space-y-6 border-t border-gray-200 py-6 px-4">
            <div class="flow-root">
              <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Company</a>
            </div>
  
            <div class="flow-root">
              <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Stores</a>
            </div>
          </div>
  
        </div>
      </div>
    </div> --}}

    <header class="relative bg-white">
        <nav>
            <p
                class="flex h-10 items-center justify-center bg-indigo-600 px-4 text-sm font-medium text-white sm:px-6 lg:px-8">
                Get free delivery on orders over $100</p>
        </nav>
        <nav aria-label="Top" style="background-image: url({{ Storage::url('images/bg-header.png') }})">
            <div class="mx-auto max-w-[80%]">
                <div class="flex h-[4.5rem] items-center">
                    <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
                    <button @click="menuOpen = !menuOpen" type="button" class="mr-8">
                        <span class="sr-only">Open menu</span>
                        <!-- Heroicon name: outline/bars-3 -->
                        <svg width="31" height="20" viewBox="0 0 31 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect width="31" height="2.81818" rx="1" fill="#fff" />
                            <rect y="8.45459" width="31" height="2.81818" rx="1" fill="#fff" />
                            <rect y="16.9091" width="31" height="2.81818" rx="1" fill="#fff" />
                        </svg>
                    </button>

                    <!-- Logo -->
                    <div class="ml-4 flex-1">
                        <a href="{{ route('home') }}">
                            <span class="sr-only">Inti Diesel</span>
                            <img class="w-56" src="{{ Storage::url('images/logo-inti.png') }}" title="Inti Diesel"
                                alt="Inti Diesel">
                        </a>
                    </div>

                    <!-- Flyout menus -->
                    <div class="flex w-1/2">
                        <div class="flex items-center justify-center w-full">
                            <input type="text"
                                class="w-full rounded-l-md border border-transparent px-5 py-[0.4rem] text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:border-transparent">
                            <button
                                class="px-5 py-[0.45rem] text-white rounded-r-md bg-gradient-to-r from-theme-yellow to-theme-orange">
                                <svg class="w-6 h-6" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.0396 0.105286C7.32757 0.166338 7.62313 0.219759 7.90352 0.280812C10.6923 0.937127 12.6777 3.5166 12.6398 6.39371C12.6171 7.80555 12.2079 9.07239 11.3364 10.179C11.2607 10.2782 11.2455 10.3392 11.344 10.4232C11.4198 10.4842 11.4804 10.5682 11.5562 10.6445C11.7835 10.8811 11.9578 11.1024 12.3822 10.9879C12.89 10.8429 13.3674 11.0719 13.7463 11.4611C14.9057 12.6363 16.0652 13.8192 17.2322 14.9945C17.4671 15.2311 17.5808 15.5363 17.6793 15.8416V16.4063C17.5581 16.704 17.4292 16.994 17.1867 17.2305C16.5805 17.8105 15.6256 17.8182 15.027 17.2305C13.8448 16.0553 12.6702 14.88 11.4955 13.7048C11.0409 13.2469 10.8969 12.6974 11.0863 12.0792C11.1242 11.9571 11.1015 11.8961 11.0181 11.8198C10.8514 11.6595 10.6771 11.4992 10.5256 11.3237C10.4195 11.2016 10.3437 11.2169 10.2224 11.3084C7.79742 13.1705 4.5161 13.0713 2.27298 11.0032C0.431495 9.30134 -0.197508 7.14923 0.454211 4.73002C1.10593 2.31844 2.72766 0.837917 5.15266 0.250285C5.35727 0.204496 5.57703 0.21976 5.76648 0.120549H7.02448L7.0396 0.105286ZM11.4652 6.36318C11.4652 3.57002 9.20696 1.28818 6.44095 1.28818C3.71282 1.28818 1.41665 3.57765 1.41665 6.2945C1.41665 9.13344 3.65977 11.4229 6.43336 11.4305C9.21453 11.4305 11.4652 9.1716 11.4652 6.36318ZM12.5717 12.1403C12.4353 12.1555 12.3064 12.2242 12.2382 12.3845C12.1549 12.5677 12.2079 12.7203 12.3443 12.85C13.4962 14.0177 14.648 15.1853 15.7999 16.3453C15.9894 16.5361 16.2243 16.5437 16.3986 16.3758C16.5729 16.2003 16.5653 15.979 16.3683 15.7806C15.224 14.6206 14.0797 13.4605 12.9354 12.2929C12.8445 12.2013 12.7384 12.1403 12.5792 12.1403H12.5717Z"
                                        fill="black" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="flex-1 flex items-center justify-end">

                        <!-- Account -->
                        <a href="#" class="flex items-center text-white mr-10">
                            <svg class="w-10 h-10" viewBox="0 0 45 45" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_277_61)">
                                    <path
                                        d="M22.445 2.96811e-05C34.8822 -0.0199703 44.99 10.07 44.99 22.5C44.99 34.87 34.8023 45.03 22.415 45C10.1477 44.97 0.0399878 34.86 -3.3422e-06 22.6C-0.0399945 10.14 10.0278 0.0200297 22.445 2.96811e-05ZM9.14796 37.79C8.25816 30.09 10.1177 24.23 17.5261 21.4C13.7269 17.13 13.537 12.63 16.9062 9.31003C19.9856 6.27003 24.7645 6.21003 27.9338 9.17003C31.463 12.45 31.333 17.02 27.4539 21.45C30.7532 22.63 33.2526 24.69 34.8423 27.8C36.3919 30.84 35.872 34.2 36.052 37.69C44.88 29.66 45.21 16.49 37.1118 8.20003C28.9136 -0.19997 15.4966 -0.0199699 7.49833 8.59003C-0.23995 16.92 0.29993 30.17 9.14796 37.79ZM33.9924 35.3C33.9924 29.26 32.3628 26.03 28.3737 24.03C25.9542 22.82 23.3748 22.95 20.8154 23.03C15.3166 23.21 11.1675 27.43 11.0275 32.95C10.9876 34.44 11.1575 35.96 10.9876 37.43C10.7876 39.15 11.5874 39.93 13.0071 40.64C18.3359 43.28 23.7747 43.75 29.3935 41.76C33.9924 40.13 33.9824 40.12 33.9824 35.3H33.9924ZM16.5263 14.88C16.4663 18.14 19.1757 20.94 22.445 20.97C25.5943 21 28.3337 18.39 28.4637 15.23C28.6036 11.97 25.9342 9.12003 22.665 9.03003C19.3857 8.93003 16.5863 11.61 16.5163 14.88H16.5263Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_277_61">
                                        <rect width="45" height="45" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <div class="flex-1 flex flex-col">
                                <span class="ml-3 text-sm font-medium">Hola,</span>
                                <span class="ml-3 text-sm font-medium">Inicia sesión</span>
                            </div>
                        </a>

                        <!-- Cart -->
                        <a type="button" @click="shoppingCartOpen=!shoppingCartOpen,disabledPage()"
                            class="relative -m-2 p-2 flex items-center hover:cursor-pointer">
                            <span class="sr-only">Cart</span>
                            <svg class="w-10 h-10" viewBox="0 0 45 45" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_277_64)">
                                    <path
                                        d="M22.45 7.3974e-06C10.02 0.0200074 -0.0400032 10.15 -3.19835e-06 22.6C0.0399968 34.86 10.15 44.97 22.42 45C34.81 45.03 45 34.88 45 22.5C45 10.12 34.89 -0.0099926 22.45 7.3974e-06ZM33.21 39.98C32.74 40.46 31.98 40.81 30.77 41.26C28.24 42.38 25.44 43 22.5 43C11.18 43 2 33.82 2 22.5C2 11.18 11.18 2.00001 22.5 2.00001C33.82 2.00001 43 11.18 43 22.5C43 29.89 39.08 36.38 33.21 39.98Z"
                                        fill="white" />
                                    <path
                                        d="M16.85 38.45C16.36 38.27 15.84 38.16 15.4 37.9C13.72 36.91 13.18 34.81 14.12 33.09C14.17 32.99 14.22 32.89 14.3 32.76C14.15 32.74 14.03 32.72 13.91 32.71C12.4 32.54 11.34 31.36 11.34 29.84C11.34 23.35 11.34 16.85 11.34 10.36C11.34 9.99 11.24 9.82 10.9 9.68C9.55001 9.13 8.22001 8.55 6.88001 7.98C6.39001 7.77 6.21001 7.43 6.37001 7.02C6.53001 6.61 6.96001 6.44 7.43001 6.63C9.06001 7.31 10.68 8.01 12.31 8.69C12.65 8.83 12.8 9.08 12.8 9.45C12.79 10.26 12.81 11.06 12.79 11.87C12.78 12.22 12.87 12.35 13.24 12.4C19.08 13.28 24.92 14.18 30.75 15.08C32.23 15.31 33.71 15.55 35.19 15.75C35.66 15.81 35.98 16 36.13 16.46V24.53C36.13 24.53 36.08 24.57 36.08 24.59C35.69 26.41 34.74 27.18 32.88 27.18C26.87 27.18 20.86 27.18 14.84 27.18C14.19 27.18 13.54 27.05 12.86 26.98C12.86 27.77 12.86 28.67 12.86 29.57C12.86 30.72 13.37 31.23 14.51 31.23C20.18 31.23 25.85 31.23 31.53 31.23C31.85 31.23 32.18 31.22 32.5 31.27C34.51 31.57 35.87 33.46 35.51 35.43C35.15 37.42 33.27 38.73 31.32 38.35C29.29 37.95 28.02 36.02 28.5 34C28.6 33.57 28.81 33.17 28.97 32.75H20.24C20.32 32.89 20.37 32.99 20.42 33.09C21.53 35.11 20.51 37.62 18.3 38.3C18.1 38.36 17.91 38.42 17.71 38.48H16.86L16.85 38.45ZM12.88 13.79C12.86 13.91 12.85 13.99 12.85 14.08C12.85 17.5 12.85 20.93 12.85 24.35C12.85 25.15 13.45 25.73 14.26 25.73C20.57 25.73 26.88 25.73 33.19 25.73C34.02 25.73 34.62 25.16 34.63 24.33C34.64 22.04 34.63 19.75 34.63 17.45C34.63 17.19 34.53 17.11 34.3 17.07C32.22 16.76 30.14 16.44 28.06 16.12C24.11 15.51 20.16 14.9 16.2 14.3C15.1 14.13 14 13.96 12.88 13.79ZM31.94 36.92C33.12 36.92 34.08 35.95 34.07 34.79C34.07 33.64 33.08 32.68 31.91 32.69C30.74 32.69 29.76 33.68 29.77 34.82C29.77 35.96 30.78 36.93 31.94 36.92ZM15.11 34.83C15.11 35.98 16.12 36.94 17.29 36.92C18.44 36.9 19.41 35.93 19.4 34.8C19.4 33.65 18.41 32.68 17.24 32.69C16.06 32.69 15.11 33.65 15.12 34.83H15.11Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_277_64">
                                        <rect width="45" height="45" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <span
                                class="absolute -right-0 -top-0 w-5 h-5 border border-theme-yellow rounded-full flex items-center justify-center bg-theme-yellow text-xs font-bold">1</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <div x-show="menuOpen" @click.outside="menuOpen = false"
            class="absolute inset-x-0 top-full text-sm text-theme-black h-screen bg-theme-bblack" style="display:none;">
            {{-- <div class="absolute inset-0 w-full h-full" aria-hidden="true"></div> --}}
            <div class="relative">
                <div class="mx-auto max-w-[80%]">
                    <div class="grid grid-cols-12 gap-y-10 gap-x-0 h-[400px]">
                        <div class="col-span-2 bg-white py-4">
                            <div>
                                <ul role="list" aria-labelledby="Clothing-heading"
                                    class="mt-6 space-y-10 sm:mt-4 sm:space-y-4">
                                    <li wire:mouseover="$emit('showMenuNivel1','categorias')"
                                        class="text-theme-black relative py-2 px-6 border-l-4 border-l-transparent group hover:border-l-4 hover:border-l-theme-orange hover:bg-theme-lwgray hover:cursor-pointer"
                                        :class="menuNivel1 == 'categorias' ?
                                            'border-l-4 border-l-theme-orange bg-theme-lwgray' : ''">
                                        <span class="font-semibold block uppercase group-hover:text-theme-orange"
                                            :class="menuNivel1 == 'categorias' ? 'text-theme-orange' : ''">Categorias</span>
                                        <span
                                            class="text-theme-orange absolute inset-y-0 right-0 flex items-center pr-4 opacity-0 group-hover:opacity-100"
                                            :class="menuNivel1 == 'categorias' ? 'opacity-100' : ''">
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                            </svg>
                                        </span>
                                    </li>
                                    <li wire:mouseover="$emit('showMenuNivel1','interfaces')"
                                        class="text-theme-black relative py-2 px-6 border-l-4 border-l-transparent group hover:border-l-4 hover:border-l-theme-orange hover:bg-theme-lwgray hover:cursor-pointer"
                                        :class="menuNivel1 == 'interfaces' ?
                                            'border-l-4 border-l-theme-orange bg-theme-lwgray' : ''">
                                        <span class="font-semibold block uppercase group-hover:text-theme-orange"
                                            :class="menuNivel1 == 'interfaces' ? 'text-theme-orange' : ''">Interfaces</span>
                                        <span
                                            class="text-theme-orange absolute inset-y-0 right-0 flex items-center pr-4 opacity-0 group-hover:opacity-100"
                                            :class="menuNivel1 == 'interfaces' ? 'opacity-100' : ''">
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                            </svg>
                                        </span>
                                    </li>
                                    <li wire:mouseover="$emit('showMenuNivel1','')"
                                        class="text-theme-black relative py-2 px-6 border-l-4 border-l-transparent group hover:border-l-4 hover:border-l-theme-orange hover:bg-theme-lwgray hover:cursor-pointer">
                                        <span
                                            class="font-semibold block uppercase group-hover:text-theme-orange">Nosotros</span>
                                        <span
                                            class="text-theme-orange absolute inset-y-0 right-0 flex items-center pr-4 opacity-0 group-hover:opacity-100">
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                            </svg>
                                        </span>
                                    </li>
                                    <li wire:mouseover="$emit('showMenuNivel1','')"
                                        class="text-theme-black relative py-2 px-6 border-l-4 border-l-transparent group hover:border-l-4 hover:border-l-theme-orange hover:bg-theme-lwgray hover:cursor-pointer">
                                        <span
                                            class="font-semibold block uppercase group-hover:text-theme-orange">Contacto</span>
                                        <span
                                            class="text-theme-orange absolute inset-y-0 right-0 flex items-center pr-4 opacity-0 group-hover:opacity-100">
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                            </svg>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @if ($menuItemsNivel1)
                            <div class="col-span-3 bg-white py-4">
                                <div
                                    class="h-[400px] overflow-auto scrollbar scrollbar-thumb-theme-orange scrollbar-track-gray-100 scrollbar-theme">
                                    <ul role="list">
                                        @foreach ($menuItemsNivel1 as $menuItemNivel1)
                                            <li wire:mouseover="$emit('showMenuNivel2',{{ $menuItemNivel1->id }})"
                                                class="text-theme-black relative py-2 px-6 border-l-4 border-l-transparent group hover:border-l-4 hover:border-l-theme-orange hover:bg-theme-lwgray hover:cursor-pointer {{ $menuItemNivel1->name == $menuNivel2 ? 'border-l-theme-orange bg-theme-lwgray' : '' }}">
                                                <a wire:click="redirectNivel1({{ $menuItemNivel1->id }})"><span
                                                        class="text-sm font-normal block truncate">{{ Str::title($menuItemNivel1->name) }}</span></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        @if ($menuItemsNivel2)
                            <div class="col-span-3 bg-white py-4">
                                <div>
                                    <ul role="list">
                                        @foreach ($menuItemsNivel2 as $menuItemNivel2)
                                            <li
                                                class="text-theme-black relative py-2 px-6 border-l-4 border-l-transparent group hover:border-l-4 hover:border-l-theme-orange hover:bg-theme-lwgray hover:cursor-pointer">
                                                <a href="{{ route('product.index', $menuItemNivel2) }}"><span
                                                        class="text-sm font-normal block truncate">{{ Str::title($menuItemNivel2->name) }}</span></a>
                                            </li>
                                        @endforeach
                                        <li
                                            class="text-theme-black relative py-2 px-6 border-l-4 border-l-transparent group hover:border-l-4 hover:border-l-theme-orange hover:bg-theme-lwgray hover:cursor-pointer">
                                            <a href=""><span class="text-sm font-normal block truncate">Ver
                                                    Todo</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>
    <nav class="bg-white shadow-3xl">
        <ul role="list" class="max-w-screen-2xl mx-auto flex items-center justify-center py-1.5">
            <li class="flex items-center justify-center">
                <img src="{{ Storage::url('images/h-pago-seguro.png') }}" alt="">
            </li>
            <li class="flex items-center justify-center ml-4">
                <img src="{{ Storage::url('images/method-pay.png') }}" alt="">
            </li>
        </ul>
    </nav>
    <!-- Pop out cart shopping -->
    <nav x-init="$watch(shoppingCartOpen, o => !o && window.setTimeout(() => (shoppingCartOpen = true), 1000))" x-show="shoppingCartOpen" style="display: none;" class="relative z-10"
        aria-labelledby="slide-over-title" x-ref="dialog" aria-modal="true">

        <div x-show="shoppingCartOpen" x-transition:enter="ease-in-out duration-500"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in-out duration-500" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
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
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                                    </path>
                                </svg>
                            </button>
                        </div>

                        <div class="flex h-full flex-col overflow-hidden bg-white shadow-xl">
                            <div class="px-4 py-3 border-b-4 border-theme-orange">
                                <h2 class="text-lg text-center font-semibold text-theme-black" id="slide-over-cart">Mi carrito</h2>
                            </div>
                            <div class="px-6 py-3">
                                <!--<div class="absolute inset-0 px-4 sm:px-6">
                                    <div class="h-full border-2 border-dashed border-gray-200" aria-hidden="true">
                                    </div>
                                </div>-->
                                <div class="relative flex flex-col h-full">
                                    <div class="flex border-[1px] rounded-lg p-2 mb-2 shadow-md">
                                      <div class="w-[30%]">
                                        <a>
                                          <img src="{{ Storage::url('products/product-1.png') }}" alt="">
                                        </a>
                                      </div>
                                      <div class="w-[70%]">
                                        <h2 class="text-xs font-semibold text-theme-black mb-1">{{Str::title('Lorem ipsum dolor sit amet consectetur')}}</h2>
                                        <p class="text-xs font-semibold text-theme-black">Marca</p>
                                      </div>
                                    </div>
                                    <div class="flex border-[1px] rounded-lg p-2 shadow-md">
                                      <div class="w-[30%]">
                                        <a>
                                          <img src="{{ Storage::url('products/product-1.png') }}" alt="">
                                        </a>
                                      </div>
                                      <div class="w-[70%]">
                                        <h2 class="text-xs font-semibold text-theme-black mb-1">{{Str::title('Lorem ipsum dolor sit amet consectetur')}}</h2>
                                        <p class="text-xs font-semibold text-theme-black">Marca</p>
                                      </div>
                                    </div>
                                </div>



                                <!--<div class="flex flex-col justify-center items-center text-center m-auto">
                                  <div class="mb-4">
                                    <svg class="w-10 h-10" viewBox="0 0 45 45" fill="#fff" xmlns="http://www.w3.org/2000/svg">
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
                                    <p class="text-sm text-theme-gray">Para seguir comprando, navega por nuestras categorías y descubre todo lo que tenemos para ti.</p>
                                </div>-->
                            </div>
                            <div class="flex flex-col mt-auto mx-6 py-4 border-t-2 border-theme-orange">
                                <div class="flex justify-between font-semibold capitalize pb-4">
                                    <p>total:</p>
                                    <p>S/. 0</p>
                                </div>
                                <button type="button"
                                    class="flex items-center justify-center py-2 px-8 border border-transparent text-base font-semibold mb-3 rounded-md text-theme-black uppercase bg-theme-lgray">Seguir
                                    comprando</button>
                                <button type="button"
                                    class="flex items-center justify-center py-2 px-8 border border-transparent text-base font-semibold rounded-md text-white uppercase bg-theme-gray">Ir
                                    a comprar</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </nav>
</div>
