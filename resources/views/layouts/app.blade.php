<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
        <title> Inti Diesel | @yield('title')</title>

        <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <!-- Swipper CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Swipper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="antialiased">
        <div class="min-h-screen">
            @livewire('navigation')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            @livewire('footer')
        </div>

        @stack('modals')

        @livewireScripts

        <script>
            function showModalQuickViewsProduct(item) {
                window.Livewire.emit('showModalQuickviewsProduct',item);                    
            }
            function addToCartProduct(item) {
                window.Livewire.emit('addToCartProduct',item);
            }
            function toggleOverflow() {
                document.body.classList.toggle('overflow-hidden');
            }
        </script>

        @stack('script')
    </body>
</html>
