<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
         <title> Inti Diesel | @yield('title')</title>

        <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    
        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="antialiased">
        <div class="min-h-screen">
            @livewire('navigation')

            <!-- Page Content -->
            <main>
                <div class="container-error-page">
                    <div class="error-page-img">
                        <div class="error-page-img-content">
                            <img src="{{Storage::url('images/bg-error-404.jpg')}}" alt="">
                        </div>    
                        <div class="error-page-caption">
                            <div class="error-page-caption-content">
                                <p class="error-page-title">Lo sentimos</p>
                                <hr class="error-page-title-line">
                                <p class="error-page-subtitle-1">@yield('subtitle-1')</p>
                                <p class="error-page-subtitle-2">@yield('subtitle-2')</p>
                                <div class="mt-6">
                                    <a href="{{route('home')}}" class="inline-flex justify-center rounded-md border border-transparent py-2 px-10 text-base font-bold text-white shadow-sm focus:outline-none uppercase transition duration-500 disabled:opacity-25 bg-gradient-to-r from-theme-yellow to-theme-orange hover:bg-gradient-to-l">Ir a inicio</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            @livewire('footer')
        </div>

        @livewireScripts
        <script>
             const toggleOverflow = () => {
                document.body.classList.toggle('overflow-hidden');
            }        
        </script>
    </body>
</html>
