<x-app-layout>
    @livewire('product-detail', ['product' => $product])

    <section class="bg-theme-swhite">
        <div class="py-12">
            <h1 class="text-2xl font-extrabold text-theme-gray text-center uppercase">Productos Relacionados</h1>
            <div x-data="{ swiper: null }" x-init="swiper = new Swiper($refs.container, {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 0,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    dynamicBullets: true,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 0,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                    },
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 30,
                    },
                    1280: {
                        slidesPerView: 5,
                        spaceBetween: 30,
                    },
                },
                grabCursor: true,
            
            })" class="flex flex-row relative">
                <div class="absolute inset-y-0 left-16 z-10 flex items-center">
                    <button @click="swiper.slidePrev()" class="flex justify-center items-center focus:outline-none">
                        <svg class="w-14 h-14" viewBox="0 0 34 58" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path class="fill-theme-lead"
                                d="M28.9078 58C27.6437 57.7434 26.7302 56.9816 25.8494 56.1076C17.7265 48.1048 9.59548 40.1101 1.45627 32.1233C0.175853 30.8644 -0.362411 29.405 0.257409 27.697C0.477608 27.0795 0.89354 26.4781 1.36656 26.005C9.70966 17.7697 18.0772 9.5504 26.4448 1.33113C27.7171 0.0882125 29.234 -0.336784 30.9303 0.280664C32.5207 0.866036 33.4259 2.06084 33.5972 3.72875C33.7358 5.05185 33.2057 6.15845 32.2597 7.08863C30.4899 8.82069 28.7283 10.5608 26.9668 12.2928C21.4699 17.6975 15.9731 23.1022 10.4681 28.5068C10.3213 28.6512 10.1419 28.7715 9.92986 28.9318C10.1501 29.1644 10.305 29.3248 10.46 29.4771C17.6939 36.5898 24.9279 43.7105 32.17 50.8152C33.4096 52.034 33.9397 53.4453 33.4096 55.1373C32.9855 56.4684 32.0803 57.3505 30.7183 57.7835C30.4981 57.8557 30.2861 57.9198 30.0659 57.992H28.9159L28.9078 58Z"
                                fill="#323232" />
                        </svg>
                    </button>
                </div>
                <div class="swiper max-w-[80%] mx-auto pt-10 pb-14 px-1" x-ref="container">
                    <ul class="swiper-wrapper">
                        @foreach ($related_products as $item)
                            <li class="swiper-slide">
                                <x-box-product :item="$item" />
                            </li>
                        @endforeach
                    </ul>
                    <div class="swiper-pagination flex justify-center items-center"></div>
                </div>
                <div class="absolute inset-y-0 right-16 z-10 flex items-center">
                    <button @click="swiper.slideNext()" class="flex justify-center items-center focus:outline-none">
                        <svg class="w-14 h-14" viewBox="0 0 34 58" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path class="fill-theme-lead"
                                d="M4.71616 0C5.98026 0.256602 6.89368 1.01839 7.77448 1.89244C15.8974 9.8952 24.0285 17.8899 32.1595 25.8767C33.4399 27.1356 33.9782 28.5951 33.3584 30.3031C33.1382 30.9205 32.7222 31.5219 32.2492 31.995C23.9061 40.2303 15.5386 48.4496 7.17914 56.6689C5.90688 57.9118 4.38995 58.3368 2.6936 57.7193C1.10328 57.134 0.197996 55.9392 0.0267301 54.2713C-0.111914 52.9482 0.418207 51.8416 1.36425 50.9114C3.134 49.1793 4.89558 47.4392 6.65718 45.7072C12.154 40.3025 17.6509 34.8978 23.1559 29.4932C23.3027 29.3488 23.482 29.2285 23.6941 29.0682C23.4739 28.8356 23.3189 28.6752 23.1639 28.5229C15.93 21.4102 8.69605 14.2895 1.45395 7.18485C0.214307 5.96599 -0.315718 4.55468 0.214391 2.86271C0.638478 1.53159 1.54368 0.649523 2.90565 0.216508C3.12585 0.13632 3.3461 0.0721692 3.5663 0H4.71616Z"
                                fill="#323232" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
