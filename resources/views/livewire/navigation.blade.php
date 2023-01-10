<div x-data="{ 
    openMenu: false,
    firstLevelMenu : @entangle('firstLevelMenu'),
    secondLevelMenu : @entangle('secondLevelMenu')
    }" 
    @keydown.window.escape="openMenu = false" class="bg-white sticky top-0 z-10">
    <!-- Mobile menu -->
    <header class="relative bg-white">
        <nav id="navbar-info-header" class="bg-gradient-to-r from-theme-yellow to-theme-orange">
            <p class="flex h-10 items-center justify-center px-4 text-sm font-medium text-black"> Get free delivery on orders over $100</p>
        </nav>
        <nav aria-label="Top" style="background-image: url({{ Storage::url('images/bg-header.png') }})">
            <div class="mx-auto max-w-[80%]">
                <div class="flex h-[4.5rem] items-center">
                    <button @click="openMenu = !openMenu" type="button" class="mr-8">
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
                        <div class="w-fit">
                            <a href="{{ route('home') }}">
                                <span class="sr-only">Inti Diesel</span>
                                <img class="w-56" src="{{ Storage::url('images/logo-inti.png') }}" title="Inti Diesel"
                                    alt="Inti Diesel">
                            </a>
                        </div>
                    </div>

                    <!-- search -->
                    <div class="flex w-1/2">
                        @livewire('search')
                    </div>

                    <div class="flex-1 flex items-center justify-end">

                        <!-- Account -->
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
                                            <span class="ml-3 text-sm font-medium">{{ Str::words(Auth::user()->name, 2, '') }}</span>
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
            
                                        <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
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
                       

                        <!-- Cart -->
                        <a type="button" wire:click="$emit('show')"
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
                            <span class="absolute -right-0 -top-0 w-5 h-5 border border-theme-yellow rounded-full flex items-center justify-center bg-theme-yellow text-xs font-bold">{{ $totalQuantityCart }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <div x-show="openMenu" x-init="$watch('openMenu', toggleOverflow)" class="absolute inset-x-0 top-full text-sm h-screen bg-theme-bblack" @click.away="openMenu = false" style="display: none">
            <div class="absolute inset-0 w-full h-full" @click="openMenu=false"></div>
            <div class="relative">
                <div class="mx-auto max-w-[80%]">
                    <div class="grid grid-cols-12 gap-y-10 gap-x-0 h-[400px] mt-1">
                        <div class="col-span-2 bg-[#000000e3] py-8" :class="firstLevelMenu=='' ? 'rounded-xl' : 'rounded-l-xl'">
                            <div class="h-[400px] overflow-auto scrollbar scrollbar-thumb-white scrollbar-track-black scrollbar-theme">
                                <ul role="list" class="space-y-10">
                                    <li class="relative py-2 px-10">
                                        <a href="{{ route('shop','categories') }}" @mouseover="firstLevelMenu = 'categories'" class="flex text-base font-bold {{ $firstLevelMenu=='categories' ? 'text-theme-yellow' : 'text-white' }} text-center hover:text-theme-yellow uppercase">
                                            <span>Categorias</span>
                                        </a>
                                    </li>
                                    <li class="relative py-2 px-10">
                                        <a href="{{ route('shop','interfaces') }}" @mouseover="firstLevelMenu = 'interfaces'" class="flex text-base font-bold {{ $firstLevelMenu=='interfaces' ? 'text-theme-yellow' : 'text-white' }} text-center hover:text-theme-yellow uppercase">
                                            <span>Interfaces</span>
                                        </a>
                                    </li>
                                    <li class="relative py-2 px-10">
                                        <a href="{{ route('about') }}" @mouseover="firstLevelMenu = ''" class="flex text-base font-bold text-white text-center hover:text-theme-yellow uppercase">
                                            <span>Nosotros</span>
                                        </a>
                                    </li>
                                    <li class="relative py-2 px-10">
                                        <a href="{{ route('contact') }}" @mouseover="firstLevelMenu = ''" class="flex text-base font-bold text-white text-center hover:text-theme-yellow uppercase">
                                            <span>Contacto</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div x-show="firstLevelMenu!=''" class="col-span-2 bg-[#000000e3] py-8" :class="firstLevelMenu=='' ? 'rounded-xl' : secondLevelMenu == '' ? 'rounded-r-xl' : ''">
                            <div x-show="firstLevelMenu=='categories'" class="h-[400px] overflow-auto scrollbar scrollbar-thumb-white scrollbar-track-black scrollbar-theme">
                                <ul role="list" class="space-y-2">
                                    @foreach ($categories as $category)
                                        <li class="relative py-2 px-6">
                                            <a role="button" @click="secondLevelMenu='{{ $category->slug }}'" class="flex text-sm font-semibold {{ $secondLevelMenu==$category->slug ? 'text-theme-yellow' : 'text-white' }} hover:text-theme-yellow capitalize">
                                                <span>{{ $category->name }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div x-show="firstLevelMenu=='interfaces'" class="h-[400px] overflow-auto scrollbar scrollbar-thumb-white scrollbar-track-black scrollbar-theme">
                                <ul>
                                    @foreach ($interfaces as $interface)
                                        <li class="relative py-2 px-6">
                                            <a role="button" @click="secondLevelMenu='{{ $interface->slug }}'" class="flex text-sm font-semibold {{ $secondLevelMenu==$interface->slug ? 'text-theme-yellow' : 'text-white' }} hover:text-theme-yellow">
                                                <span class="capitalize">{{ $interface->name }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div x-show="secondLevelMenu!=''"  class="col-span-2 bg-[#000000e3] rounded-r-xl py-8" >
                            <div class="h-[400px] overflow-auto scrollbar scrollbar-thumb-white scrollbar-track-black scrollbar-theme">
                                <ul>
                                    @foreach ($dataSecondLevelMenu as $item)
                                    <li class="relative py-2 px-6">
                                        <a href="{{ route('product.index',$item->slug) }}" class="flex text-sm font-semibold text-white hover:text-theme-yellow">
                                            <span class="capitalize">{{ $item->name }}</span>
                                        </a>
                                    </li>
                                    @endforeach

                                    @if ($firstLevelMenu!='')
                                    <li class="relative py-2 px-6">
                                        <a href="{{ route('shop',['shop_section'=>($firstLevelMenu=='categories'?'category':'interface'),'shop_section_url'=>$secondLevelMenu]) }}" class="flex text-sm font-semibold text-white hover:text-theme-yellow">
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
    @livewire('frontend.products.cart-product')
</div>

