<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

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

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="antialiased ">
        <x-jet-banner />

        <div class="min-h-screen">
            @livewire('navigation')
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <!-- Page Content -->

            @livewire('footer')
        </div>

        @stack('modals')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                window.livewire.on('disabledPage', function() {
                    document.body.classList.toggle('overflow-hidden');
                });     
            });

            function disabledPage(){
                document.body.classList.toggle('overflow-hidden');
            }
        </script>
        @livewireScripts
    </body>
</html>
