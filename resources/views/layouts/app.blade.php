<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':  
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-NNJK5KH');
        </script>
        <!-- End Google Tag Manager -->

        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
        <title> Inti Diesel | @yield('title')</title>

        <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <!-- Swipper CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

        <!-- Alertify CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/alertify/alertify.min.css') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Swipper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

        <!-- Alertify JS -->
        <script src="{{ asset('assets/js/alertify/alertify.min.js') }}"></script>

        <!-- Styles -->
        @livewireStyles

        <!-- Styles Package laravel-tel-input -->
        @laravelTelInputStyles
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

        <!-- Google Tag Manager (noscript) -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NNJK5KH" height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!-- End Google Tag Manager (noscript) -->

        @livewireScripts

        @laravelTelInputScripts

        <script>

            window.addEventListener('DOMContentLoaded', (event) => {
                
                const header_webpage = document.getElementById("header-webpage");
                const navbar_info_header = document.getElementById("navbar-info-header");

                window.onscroll = () => { scrollFunction(); }

                const scrollFunction = () => {
                    if (document.body.scrollTop > 110 || document.documentElement.scrollTop > 110) {
                        if (navbar_info_header) { $(navbar_info_header).slideUp(200); }
                    } else {
                        if (navbar_info_header) { $(navbar_info_header).slideDown(200); }
                    }
                }  

                window.livewire.on('show-alert', (msg,type) => {
                    alertify.notify(msg,type);
                });

            });

            const showModalQuickViewsProduct = (item) => {
                window.Livewire.emit('showModalQuickviewsProduct',item);   
            }

            const addToCartProduct = (item) => {
                window.Livewire.emit('addToCartProduct',item);
            }

            const toggleOverflow = () => {
                document.body.classList.toggle('overflow-hidden');
            }        
        </script>

        

        @stack('script')
    </body>
</html>
