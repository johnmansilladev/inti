<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
        <title> Inti Diesel | @yield('title')</title>
        
        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

        <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <!-- Swipper CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Swipper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

        <!-- JS Image Zoom -->
        <script src="https://unpkg.com/js-image-zoom@0.7.0/js-image-zoom.js" type="application/javascript"></script>

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
