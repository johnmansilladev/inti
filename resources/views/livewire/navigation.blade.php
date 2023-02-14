<div x-data="{
    openMenu: false,
    firstLevelMenu: @entangle('firstLevelMenu'),
    secondLevelMenu: @entangle('secondLevelMenu')
    }" 
    @keydown.window.escape="openMenu = false"
    class="bg-white sticky top-0 z-10">

    <!-- Mobile menu -->
    <div x-show="openMenu" class="relative z-40 lg:hidden" x-ref="dialog" aria-modal="true" style="display: none;">
      <div x-show="openMenu" x-transition:enter="transition-opacity ease-linear duration-300" 
        x-transition:enter-start="opacity-0" 
        x-transition:enter-end="opacity-100" 
        x-transition:leave="transition-opacity ease-linear duration-300" 
        x-transition:leave-start="opacity-100" 
        x-transition:leave-end="opacity-0" 
        class="fixed inset-0 bg-black bg-opacity-25">
    </div>
  
      <div class="fixed inset-0 z-40 flex">
        <div x-show="openMenu" x-transition:enter="transition ease-in-out duration-300 transform" 
            x-transition:enter-start="-translate-x-full" 
            x-transition:enter-end="translate-x-0" 
            x-transition:leave="transition ease-in-out duration-300 transform" 
            x-transition:leave-start="translate-x-0" 
            x-transition:leave-end="-translate-x-full" 
            class="relative flex w-full max-w-xs flex-col bg-[#000000] opacity-[0.97] shadow-xl" @click.away="openMenu = false">
            <div class="absolute top-5 right-3">
                <button type="button" class="inline-flex items-center justify-center rounded-md p-1 text-gray-400"  @click="openMenu = false">
                    <span class="sr-only">Close menu</span>
                    <!-- Heroicon name: outline/x-mark -->
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex h-full flex-col shadow-xl">
                <div class="flex justify-center items-center px-4 py-4">
                    <a href="{{ route('home') }}">
                        <span class="sr-only">Inti Diesel</span>
                        <img class="w-40 h-auto" src="{{ Storage::url('images/logo-inti.png') }}" title="Inti Diesel" alt="Inti Diesel">
                    </a>
                </div>
               
                <div class="flex-1 overflow-y-auto scrollbar scrollbar-thumb-white scrollbar-track-black scrollbar-theme px-4 py-6">
                   
                <nav>
                    <ul>
                        <li x-data="{open: true}" class="border-b border-theme-gray">
                            <a role="button" @click="open = !open" class="group relative w-full flex justify-between items-center text-left py-[0.65rem] px-[1.25rem] border-l-4 border-transparent">
                                <span class="text-base font-semibold uppercase" :class="open ? 'text-theme-yellow' : 'text-white'">Menú</span>
                                <span class="ml-6 flex items-center">
                                    <svg x-show="!(open)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-white" style="display: none;">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" :class="open ? 'text-theme-yellow' : 'text-white'">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                    </svg>
                                </span>
                            </a>
                            <ul x-show="open">
                                <li x-data="{open: false}" class="border-b border-theme-gray">
                                    <a role="button" type="button" @click="open = !open" class="group relative w-full flex justify-between items-center text-left py-[0.65rem] px-[1.25rem] border-l-4 border-l-transparent" :class="open ? 'bg-[#1c1c1cfa] border-l-theme-yellow' : 'border-l-transparent'">
                                        <span class="text-[15px] text-white font-semibold capitalize ml-4">Categorías</span>
                                        <span class="ml-6 flex items-center">
                                            <svg x-show="!(open)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-white" style="display: none;">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-white">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                            </svg>
                                        </span>
                                    </a>
                                    <ul x-show="open">
                                        @foreach ($categories as $category)
                                            <li><a href="{{ route('shop',['shop_section' => 'category', 'shop_section_url' => $category->slug]) }}" class="flex justify-between items-center py-[0.45rem] px-[1.25rem]"><span class="text-white text-sm capitalize ml-6">{{ $category->name }}</span></a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li x-data="{open: false}">
                                    <a role="button" @click="open = !open" class="group relative w-full flex justify-between items-center text-left py-[0.65rem] px-[1.25rem] border-l-4" :class="open ? 'bg-[#1c1c1cfa] border-l-theme-yellow' : 'border-l-transparent'">
                                        <span class="text-[15px] text-white font-semibold capitalize ml-4">Interfaces</span>
                                        <span class="ml-6 flex items-center">
                                            <svg x-show="!(open)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-white" style="display: none;">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-white">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                            </svg>
                                        </span>
                                    </a>    
                                    <ul x-show="open">
                                        @foreach ($interfaces as $interface)
                                            <li><a href="{{ route('shop',['shop_section' => 'interface', 'shop_section_url' => $interface->slug]) }}" class="flex justify-between items-center py-[0.45rem] px-[1.25rem]" href=""><span class="text-white text-sm capitalize ml-6">{{ $interface->name }}</span></a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li x-data="{open: false}" class="border-b border-theme-gray">
                            <a href="{{ route('about') }}" @click="open = !open" class="group relative w-full flex justify-between items-center text-left py-[0.65rem] px-[1.25rem] border-l-4" :class="open ? 'bg-[#1c1c1cfa] border-l-theme-yellow' : 'border-l-transparent'">
                                <span class="text-base text-white font-semibold uppercase">Nosotros</span>
                            </a>
                        </li>
                        <li x-data="{open: false}">
                            <a href="{{ route('contact') }}" @click="open = !open" class="group relative w-full flex justify-between items-center text-left py-[0.65rem] px-[1.25rem] border-l-4" :class="open ? 'bg-[#1c1c1cfa] border-l-theme-yellow' : 'border-l-transparent'">
                                <span class="text-base text-white font-semibold uppercase">Contacto</span>
                            </a>
                            <ul>
                                <li>
                                    <div class="flex items-center text-white py-[0.65rem] px-[1.25rem]">
                                        <svg class="w-8 h-8" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20.1845 6.70915C19.6548 5.39617 18.8954 4.21767 17.9275 3.20543C16.9595 2.19563 15.8298 1.401 14.5689 0.850869C13.2798 0.286068 11.9111 0 10.5001 0H10.4533C9.03295 0.00733507 7.65716 0.300738 6.36341 0.877764C5.1142 1.43523 3.99388 2.22742 3.03529 3.23721C2.0767 4.24701 1.32435 5.42062 0.804039 6.72871C0.264977 8.08325 -0.00689828 9.52337 0.000132967 11.0051C0.00716422 12.7019 0.396227 14.3865 1.12513 15.8927V19.6091C1.12513 20.2301 1.60795 20.7338 2.20326 20.7338H5.7681C7.21185 21.4942 8.8267 21.9001 10.4533 21.9074H10.5025C11.9064 21.9074 13.2681 21.6238 14.5501 21.0688C15.804 20.5235 16.9314 19.7411 17.897 18.7411C18.865 17.7411 19.6267 16.5724 20.1587 15.2692C20.7119 13.9195 20.9931 12.4843 21.0001 11.0026C21.0072 9.51359 20.7306 8.06858 20.1845 6.70915V6.70915ZM16.6431 17.4184C15.0001 19.1152 12.8204 20.0492 10.5001 20.0492H10.4603C9.04701 20.0419 7.6431 19.6751 6.40326 18.9856L6.20638 18.8756H2.90638V15.433L2.80091 15.2276C2.13998 13.9342 1.78841 12.4696 1.78138 10.9953C1.77201 8.55759 2.66498 6.26904 4.30326 4.5453C5.9392 2.82156 8.12591 1.868 10.4626 1.85822H10.5025C11.6744 1.85822 12.8111 2.09539 13.8822 2.56483C14.9275 3.02205 15.865 3.67976 16.6712 4.52085C17.4751 5.35949 18.1079 6.33995 18.5462 7.43043C19.0009 8.56003 19.2283 9.75809 19.2236 10.9953C19.2095 13.4305 18.2931 15.7117 16.6431 17.4184V17.4184Z" fill="white"/>
                                            <path d="M15.2228 13.103C14.9673 12.9661 13.6946 12.3157 13.4579 12.2277C13.2212 12.1348 13.0478 12.0908 12.8767 12.3646C12.7032 12.636 12.211 13.2399 12.0563 13.4233C11.9063 13.6042 11.754 13.6262 11.4985 13.4918C9.97978 12.6996 8.98369 12.0785 7.98291 10.2863C7.71807 9.80954 8.24775 9.84377 8.74228 8.81442C8.82666 8.63349 8.78447 8.47945 8.71885 8.34253C8.65322 8.20561 8.1376 6.8804 7.92197 6.34005C7.71338 5.81437 7.49775 5.88772 7.34072 5.87794C7.19072 5.86816 7.01963 5.86816 6.84619 5.86816C6.67275 5.86816 6.39385 5.93663 6.15713 6.20313C5.92041 6.47453 5.25244 7.12735 5.25244 8.45256C5.25244 9.77776 6.17822 11.0614 6.30478 11.2423C6.43603 11.4233 8.12588 14.1421 10.7204 15.3133C12.361 16.0517 13.0032 16.1153 13.8235 15.9881C14.3228 15.9099 15.3517 15.3377 15.5649 14.7045C15.7782 14.0737 15.7782 13.5333 15.7149 13.4208C15.6517 13.301 15.4782 13.2326 15.2228 13.103Z" fill="white"/>
                                        </svg>
                                        <a href="https://api.whatsapp.com/send?phone=51930825355" class="relative flex-1 flex flex-col">
                                            <span class="ml-3 text-sm font-medium">Whatsapp</span>
                                            <span class="ml-3 text-sm font-medium">+51 930 825 355</span>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center text-white py-[0.65rem] px-[1.25rem]">
                                        <svg class="w-8 h-8" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M18 0.444336H2C0.9 0.444336 0.00999999 1.38323 0.00999999 2.53076L0 15.0493C0 16.1968 0.9 17.1357 2 17.1357H18C19.1 17.1357 20 16.1968 20 15.0493V2.53076C20 1.38323 19.1 0.444336 18 0.444336ZM18 15.0493H2V4.61718L10 9.83323L18 4.61718V15.0493ZM10 7.74681L2 2.53076H18L10 7.74681Z" fill="white"/>
                                        </svg>
                                        <a href="mailto:intidiesel@gmail.com" class="relative flex-1 flex flex-col">
                                            <span class="ml-3 text-sm font-medium">{{ __('Escribenos a') }}</span>
                                            <span
                                                class="ml-3 text-sm font-medium">intidiesel@gmail.com</span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>

                </div>
                <div class="py-6 px-5">
                     <!-- Account -->
                     <div>
                        @auth
                            <a role="button" class="flex items-center text-white">
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
                                    <span
                                        class="ml-3 text-sm font-medium">{{ Str::words(Auth::user()->firstname, 2, '') }}</span>
                                </div>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="flex items-center text-white">
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
                                    <span
                                        class="ml-3 text-sm font-medium">{{ __('Inicia sesión') }}</span>
                                </div>
                            </a>
                        @endauth
                        </div>
                </div>
            </div>
        </div>
      </div>
    </div>

    <header id="header-webpage" class="relative bg-white">
        @if ($announcements->count())
        <div id="navbar-info-header" class="announcement-container" x-data x-init="swiper = new Swiper($refs.container, {
                loop: false,
                slidesPerView: 'auto',
                autoplay: {
                    delay: 6000,
                    disableOnInteraction: false,
                }
            })">

            <div class="swiper slider-container" x-ref="container">
                <div class="swiper-wrapper">
                    @foreach ($announcements as $key => $announcement)
                        <div class="swiper-slide">
                            @livewire('frontend.banners.announcement',['announcement' => $announcement],key($announcement->id))
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif  
        <nav aria-label="Top" style="background-image: url({{ Storage::url('images/bg-header.png') }})">
            <div class="container">
                <div class="navbar ">
                    <button @click="openMenu = !openMenu" type="button" class="order-1 md:mr-8">
                        <span class="sr-only">Open menu</span>
                        <!-- Heroicon name: outline/bars-3 -->
                        <svg class="w-7 md:w-8 h-auto" viewBox="0 0 31 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect width="31" height="2.81818" rx="1" fill="#fff" />
                            <rect y="8.45459" width="31" height="2.81818" rx="1" fill="#fff" />
                            <rect y="16.9091" width="31" height="2.81818" rx="1" fill="#fff" />
                        </svg>
                    </button>

                    <!-- Logo -->
                    <div class="md:ml-4 flex md:flex-1 order-2">
                        <div class="w-full md:w-fit">
                            <a href="{{ route('home') }}">
                                <span class="sr-only">Inti Diesel</span>
                                <img class="w-40 md:w-56 h-auto" src="{{ Storage::url('images/logo-inti.png') }}" title="Inti Diesel" alt="Inti Diesel">
                            </a>
                        </div>
                    </div>

                    <!-- search -->
                    <div class="flex w-full pt-2 md:pt-0 md:w-1/2 order-4 md:order-3">
                        @livewire('search')
                    </div>

                    <div class="md:flex-1 flex items-center justify-end order-3 md:order-4">

                        <!-- Account -->
                        <div class="hidden md:block">
                        @auth
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <a role="button" class="flex items-center text-white mr-10">
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
                                            <span
                                                class="ml-3 text-sm font-medium">{{ Str::words(Auth::user()->firstname, 2, '') }}</span>
                                        </div>
                                    </a>
                                </x-slot>

                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Account') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Profile') }}
                                    </x-jet-dropdown-link>

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-jet-dropdown>
                        @else
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <a role="button" class="flex items-center text-white mr-10">
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
                                </x-slot>
                                <x-slot name="content">
                                    <x-jet-dropdown-link href="{{ route('login') }}">
                                        {{ __('Login') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('register') }}">
                                        {{ __('Register') }}
                                    </x-jet-dropdown-link>
                                </x-slot>
                            </x-jet-dropdown>
                        @endauth
                        </div>

                        <!-- Cart -->
                        <a type="button" wire:click="$emit('show')"
                            class="relative -m-2 p-2 flex items-center hover:cursor-pointer">
                            <span class="sr-only">Cart</span>
                            <svg class="w-8 md:w-10 h-auto" viewBox="0 0 45 45" fill="none"
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
                            <span class="cart-count">{{ $totalQuantityCart }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <div x-show="openMenu" x-init="$watch('openMenu', toggleOverflow)"
            class="max-md:hidden absolute inset-x-0 top-full text-sm h-screen bg-theme-bblack" @click.away="openMenu = false"
            style="display: none">
            <div class="absolute inset-0 w-full h-full" @click="openMenu=false"></div>
            <div class="relative">
                <div class="mx-auto max-w-[80%]">
                    <div class="grid grid-cols-12 gap-y-10 gap-x-0 h-[400px] mt-1">
                        <div class="col-span-2 bg-[#000000e3] py-8"
                            :class="firstLevelMenu == '' ? 'rounded-xl' : 'rounded-l-xl'">
                            <div
                                class="h-[400px] overflow-auto scrollbar scrollbar-thumb-white scrollbar-track-black scrollbar-theme">
                                <ul role="list" class="space-y-10">
                                    <li class="relative py-2 px-10">
                                        <a href="{{ route('shop', 'categories') }}"
                                            @mouseover="firstLevelMenu = 'categories'"
                                            class="flex text-base font-bold {{ $firstLevelMenu == 'categories' ? 'text-theme-yellow' : 'text-white' }} text-center hover:text-theme-yellow uppercase">
                                            <span>Categorías</span>
                                        </a>
                                    </li>
                                    <li class="relative py-2 px-10">
                                        <a href="{{ route('shop', 'interfaces') }}"
                                            @mouseover="firstLevelMenu = 'interfaces'"
                                            class="flex text-base font-bold {{ $firstLevelMenu == 'interfaces' ? 'text-theme-yellow' : 'text-white' }} text-center hover:text-theme-yellow uppercase">
                                            <span>Interfaces</span>
                                        </a>
                                    </li>
                                    <li class="relative py-2 px-10">
                                        <a href="{{ route('about') }}" @mouseover="firstLevelMenu = ''"
                                            class="flex text-base font-bold text-white text-center hover:text-theme-yellow uppercase">
                                            <span>Nosotros</span>
                                        </a>
                                    </li>
                                    <li class="relative py-2 px-10">
                                        <a href="{{ route('contact') }}" @mouseover="firstLevelMenu = ''"
                                            class="flex text-base font-bold text-white text-center hover:text-theme-yellow uppercase">
                                            <span>Contacto</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div x-show="firstLevelMenu!=''" class="col-span-2 bg-[#000000e3] py-8"
                            :class="firstLevelMenu == '' ? 'rounded-xl' : secondLevelMenu == '' ? 'rounded-r-xl' : ''">
                            <div x-show="firstLevelMenu=='categories'"
                                class="h-[400px] overflow-auto scrollbar scrollbar-thumb-white scrollbar-track-black scrollbar-theme">
                                <ul role="list" class="space-y-2">
                                    @foreach ($categories as $category)
                                        <li class="relative py-2 px-6">
                                            <a role="button" @click="secondLevelMenu='{{ $category->slug }}'"
                                                class="flex text-sm font-semibold {{ $secondLevelMenu == $category->slug ? 'text-theme-yellow' : 'text-white' }} hover:text-theme-yellow capitalize">
                                                <span>{{ $category->name }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div x-show="firstLevelMenu=='interfaces'"
                                class="h-[400px] overflow-auto scrollbar scrollbar-thumb-white scrollbar-track-black scrollbar-theme">
                                <ul>
                                    @foreach ($interfaces as $interface)
                                        <li class="relative py-2 px-6">
                                            <a role="button" @click="secondLevelMenu='{{ $interface->slug }}'"
                                                class="flex text-sm font-semibold {{ $secondLevelMenu == $interface->slug ? 'text-theme-yellow' : 'text-white' }} hover:text-theme-yellow">
                                                <span class="capitalize">{{ $interface->name }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div x-show="secondLevelMenu!=''" class="col-span-2 bg-[#000000e3] rounded-r-xl py-8">
                            <div
                                class="h-[400px] overflow-auto scrollbar scrollbar-thumb-white scrollbar-track-black scrollbar-theme">
                                <ul>
                                    @foreach ($dataSecondLevelMenu as $item)
                                        <li class="relative py-2 px-6">
                                            <a href="{{ route('product.index', $item->slug) }}"
                                                class="flex text-sm font-semibold text-white hover:text-theme-yellow">
                                                <span class="capitalize">{{ $item->name }}</span>
                                            </a>
                                        </li>
                                    @endforeach

                                    @if ($firstLevelMenu != '')
                                        <li class="relative py-2 px-6">
                                            <a href="{{ route('shop', ['shop_section' => $firstLevelMenu == 'categories' ? 'category' : 'interface', 'shop_section_url' => $secondLevelMenu]) }}"
                                                class="flex text-sm font-semibold text-white hover:text-theme-yellow">
                                                <span class="capitalize">ver todo</span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <nav class="bg-white shadow-3xl {{ request()->route()->getName()!='home' ? 'max-md:hidden' : '' }}">
        <ul role="list" class="container flex items-center justify-center py-1.5">
            <li class="flex items-center justify-center">
                <picture>
                    <source media="(max-width: 640px)" srcset="{{ Storage::url('images/h-pago-seguro-mobile.png') }}">
                    <img src="{{ Storage::url('images/h-pago-seguro.png') }}" title="pago seguro" alt="pago seguro">
                </picture> 
            </li>
            <li class="hidden md:flex items-center justify-center ml-4">
                <picture>
                    <img src="{{ Storage::url('images/method-pay.png') }}" title="métodos de pago" alt="métodos de pago">
                </picture>
            </li>
        </ul>
    </nav>


    <!-- Pop out cart shopping -->
    @livewire('frontend.products.cart-product')
</div>
