<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <!-- Alertify CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/alertify/alertify.min.css') }}">
    
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Alertify JS -->
        <script src="{{ asset('assets/js/alertify/alertify.min.js') }}"></script>

        <!-- Styles -->
        @livewireStyles

    </head>
    <body class="antialiased h-full overflow-hidden">
    <div class="flex h-full">
        
        @livewire('admin.navigation')
        <!-- Content area -->
        <div class="flex flex-1 flex-col overflow-hidden">

        @livewire('admin.header')
    
        <!-- Main content -->
        <div class="flex flex-1 items-stretch overflow-hidden">
            <main class="flex-1 overflow-y-auto">
            <!-- Primary column -->
            {{-- <section aria-labelledby="primary-heading" class="flex h-full min-w-0 flex-1 flex-col lg:order-last">
                <h1 id="primary-heading" class="sr-only">Photos</h1>
                <!-- Your content -->
                
            </section> --}}
                {{ $slot }}
            </main>
        </div>
        </div>
    </div>

        @livewireScripts

        <script>
             window.addEventListener('DOMContentLoaded', (event) => {
                window.livewire.on('show-alert', (msg,type) => {
                    alertify.notify(msg,type);
                });
             });
        </script>
    </body>
</html>
