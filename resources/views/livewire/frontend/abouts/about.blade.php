<div>
    <section>
        <div class="relative">
            <picture>
                <img src="{{ Storage::url('about/banner-about.png') }}" alt="" class="w-full h-full object-center object-cover">
            </picture>
        </div>
    </section>
    <section>
        <div class="max-w-[70%] mx-auto my-10">
            <div class="grid grid-cols-2 gap-8">
                <div>
                    <h1 class="flex flex-col text-4xl font-bold border-b-2 border-theme-yellow pb-2 mb-10">
                        <span>Conoce más</span>
                        <span>sobre Inti Diesel</span>
                    </h1>
                    <p class="mb-3 text-base text-justify">
                        INTI DIESEL es un emprendimiento que brinda soluciones de software de diagnóstico, 
                        reprogramamción y actualización de software para transportes de carga pesada, agrícola, 
                        construcción, camiones, transporte marino, entre otros.
                    </p>
                    <p class="mb-3 text-base text-justify">
                        Estamos comprometidos con la satisfacción de nuestros clientes, brindando un servicio de 24 horas
                        y ofreciendo los software más comerciales y únicos en el mercado peruano.
                    </p>
                    <p class="mb-10 text-base text-justify">
                        Contamos con un grupo de profesionales , técnicos e ingenieros con más de 3 años de experiencia en el rubro. 
                        Años que nos dio la experiencia necesaria para obtener una mejor visión sobre el sector y las necesidades de esta, 
                        comprendiendo las capacidades de nuestro personal para brindar mejor soluciones y servicios a nuestros clientes.
                    </p>
                    <a class="btn btn-yellow" href="{{ route('contact') }}">
                        contáctanos
                    </a>
                </div>
                <div class="m-auto">
                    <picture>
                        <img class="w-96 h-auto" src="{{ Storage::url('about/banner-about-2.png') }}" alt="">
                    </picture>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="max-w-[70%] mx-auto py-12">
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
                        slidesPerView: 3.5,
                        spaceBetween: 30,
                    },
                    1280: {
                        slidesPerView: 4,
                        spaceBetween: 30,
                    },
                },
                grabCursor: true,
            
            })" class="flex flex-row relative">
                <div class="swiper pt-10 pb-14 px-1" x-ref="container">
                    <ul class="swiper-wrapper">
                        <li class="swiper-slide">
                            <a href="" class="bg-theme-lwgray flex flex-col h-full p-5 rounded-2xl shadow-xl">
                                <div>
                                    <svg class="w-16 h-16" viewBox="0 0 63 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.147949 1.7184C0.147949 0.777998 0.910271 0.015625 1.85073 0.015625H5.36333C7.64624 0.015625 9.62401 1.52468 10.2598 3.66692H59.1065C61.2556 3.66692 62.8674 5.633 62.4459 7.74033L57.6382 31.7788C57.3307 33.3163 56.0132 34.4452 54.4467 34.5132L15.8082 36.1932L16.4836 40.1794L21.0199 40.1795L48.4042 40.1794C52.3694 40.1795 55.5838 43.3939 55.5838 47.3591C55.5838 51.3243 52.3694 54.5388 48.4042 54.5388C44.439 54.5388 41.2245 51.3243 41.2245 47.3591C41.2245 45.9746 41.6165 44.6816 42.2954 43.585H27.1286C27.8076 44.6816 28.1995 45.9746 28.1995 47.3591C28.1995 51.3243 24.9851 54.5388 21.0199 54.5388C17.0546 54.5388 13.8401 51.3243 13.8401 47.3591C13.8401 45.8494 14.306 44.4486 15.102 43.2926C14.0856 42.8409 13.3217 41.9039 13.1259 40.7483L7.0422 4.8395C6.90346 4.02054 6.19393 3.42118 5.36333 3.42118H1.85073C0.910271 3.42118 0.147949 2.65881 0.147949 1.7184ZM17.2457 47.3591C17.2457 45.2747 18.9355 43.585 21.0199 43.585C23.1042 43.585 24.794 45.2747 24.794 47.3591C24.794 49.4435 23.1042 51.1332 21.0199 51.1332C18.9355 51.1332 17.2457 49.4435 17.2457 47.3591ZM48.4042 43.585C46.3199 43.585 44.6301 45.2747 44.6301 47.3591C44.6301 49.4435 46.3199 51.1332 48.4042 51.1332C50.4886 51.1332 52.1783 49.4435 52.1783 47.3591C52.1783 45.2747 50.4886 43.585 48.4042 43.585ZM15.2349 32.8093L10.8745 7.07248H59.1065L54.2989 31.1109L15.2349 32.8093ZM21.0198 49.1143C21.9891 49.1143 22.7749 48.3285 22.7749 47.3591C22.7749 46.3898 21.9891 45.604 21.0198 45.604C20.0504 45.604 19.2646 46.3898 19.2646 47.3591C19.2646 48.3285 20.0504 49.1143 21.0198 49.1143ZM50.1594 47.3591C50.1594 48.3285 49.3735 49.1143 48.4042 49.1143C47.4348 49.1143 46.649 48.3285 46.649 47.3591C46.649 46.3898 47.4348 45.604 48.4042 45.604C49.3735 45.604 50.1594 46.3898 50.1594 47.3591ZM18.9679 13.513C18.9679 12.5725 19.7302 11.8102 20.6707 11.8102C21.611 11.8102 22.3734 12.5725 22.3734 13.513V16.2505C22.3734 17.1909 21.611 17.9533 20.6707 17.9533C19.7302 17.9533 18.9679 17.1909 18.9679 16.2505V13.513ZM25.9886 13.513C25.9886 12.5725 26.7509 11.8102 27.6914 11.8102C28.6317 11.8102 29.3942 12.5725 29.3942 13.513V16.2505C29.3942 17.1909 28.6317 17.9533 27.6914 17.9533C26.7509 17.9533 25.9886 17.1909 25.9886 16.2505V13.513ZM34.712 11.8102C33.7716 11.8102 33.0093 12.5725 33.0093 13.513V16.2505C33.0093 17.1909 33.7716 17.9533 34.712 17.9533C35.6524 17.9533 36.4148 17.1909 36.4148 16.2505V13.513C36.4148 12.5725 35.6524 11.8102 34.712 11.8102ZM40.03 13.513C40.03 12.5725 40.7923 11.8102 41.7328 11.8102C42.6731 11.8102 43.4355 12.5725 43.4355 13.513V16.2505C43.4355 17.1909 42.6731 17.9533 41.7328 17.9533C40.7923 17.9533 40.03 17.1909 40.03 16.2505V13.513ZM48.7534 11.8102C47.8129 11.8102 47.0506 12.5725 47.0506 13.513V16.2505C47.0506 17.1909 47.8129 17.9533 48.7534 17.9533C49.6937 17.9533 50.4562 17.1909 50.4562 16.2505V13.513C50.4562 12.5725 49.6937 11.8102 48.7534 11.8102ZM18.9679 22.2888C18.9679 21.3484 19.7302 20.586 20.6707 20.586C21.611 20.586 22.3734 21.3484 22.3734 22.2888V25.0263C22.3734 25.9668 21.611 26.7291 20.6707 26.7291C19.7302 26.7291 18.9679 25.9668 18.9679 25.0263V22.2888ZM27.6914 20.586C26.7509 20.586 25.9886 21.3484 25.9886 22.2888V25.0263C25.9886 25.9668 26.7509 26.7291 27.6914 26.7291C28.6317 26.7291 29.3942 25.9668 29.3942 25.0263V22.2888C29.3942 21.3484 28.6317 20.586 27.6914 20.586ZM33.0093 22.2888C33.0093 21.3484 33.7716 20.586 34.712 20.586C35.6524 20.586 36.4148 21.3484 36.4148 22.2888V25.0263C36.4148 25.9668 35.6524 26.7291 34.712 26.7291C33.7716 26.7291 33.0093 25.9668 33.0093 25.0263V22.2888ZM41.7328 20.586C40.7923 20.586 40.03 21.3484 40.03 22.2888V25.0263C40.03 25.9668 40.7923 26.7291 41.7328 26.7291C42.6731 26.7291 43.4355 25.9668 43.4355 25.0263V22.2888C43.4355 21.3484 42.6731 20.586 41.7328 20.586ZM47.0506 22.2888C47.0506 21.3484 47.8129 20.586 48.7534 20.586C49.6937 20.586 50.4562 21.3484 50.4562 22.2888V25.0263C50.4562 25.9668 49.6937 26.7291 48.7534 26.7291C47.8129 26.7291 47.0506 25.9668 47.0506 25.0263V22.2888Z" fill="#FDC700"/>
                                    </svg>
                                </div>
                                <div>
                                    <h1 class="text-base font-bold my-4">SOPORTE TÉCNICO</h1>
                                    <p class="text-sm text-justify">Proporcionamos asistencia técnica vía remota para todos los programas, 
                                       con personal altamente capacitados y en cualquier momento del día, 
                                       para brindar la ayuda necesaria a nuestros clientes.
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li class="swiper-slide">
                            <a href="" class="bg-theme-lwgray flex flex-col h-full p-5 rounded-2xl shadow-xl">
                                <div>
                                    <svg class="w-16 h-16" viewBox="0 0 58 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.0654297 31.0983C0.0654297 29.9778 0.0654297 28.8587 0.0654297 27.7382C0.0990868 27.5587 0.150975 27.382 0.163596 27.2011C0.336089 24.6179 0.877408 22.109 1.7581 19.6801C6.77161 5.86944 21.3353 -1.91237 35.6172 1.57676C50.3506 5.17667 59.7942 19.9143 56.9053 34.7935C55.7974 40.4998 53.2114 45.4348 49.1249 49.5592C44.8406 53.8842 39.6925 56.6062 33.6791 57.6425C32.5993 57.829 31.5054 57.9384 30.4172 58.0843H27.057C26.3012 57.9945 25.5425 57.9174 24.788 57.8108C19.135 57.0129 14.1355 54.755 9.85685 50.977C4.8181 46.5273 1.66555 40.9907 0.505777 34.3504C0.317858 33.2734 0.209875 32.1823 0.0654297 31.0983ZM9.62967 45.9242C10.4669 42.7282 11.9352 39.9529 14.0962 37.559C16.2657 35.1582 18.8882 33.4024 21.9538 32.2328C15.2799 27.4409 15.4383 18.8653 19.7885 14.1365C24.2607 9.27583 31.8139 8.80463 36.6648 13.1478C39.29 15.4968 40.7275 18.4362 40.7793 21.9533C40.8439 26.2376 39.0081 29.6314 35.512 32.2216C38.6071 33.3954 41.2071 35.1526 43.3653 37.5506C45.532 39.9571 46.9989 42.745 47.8389 45.906C55.4384 37.4847 56.967 22.6475 47.2808 12.2475C37.4347 1.67212 21.2414 1.31872 10.9802 11.4257C0.79046 21.4625 1.49866 36.7429 9.62967 45.9242ZM29.1789 54.727C29.751 54.6807 30.7958 54.626 31.8308 54.504C36.6395 53.9332 40.907 52.0709 44.6653 49.0347C44.8084 48.9183 44.9065 48.6322 44.8841 48.4415C44.699 46.8358 44.2264 45.31 43.5434 43.8487C40.8467 38.0807 35.132 34.3756 28.6614 34.4009C25.1877 34.4149 22.0057 35.4457 19.2023 37.5057C15.4608 40.2558 13.2282 43.9413 12.5663 48.5509C12.5452 48.7024 12.6714 48.9337 12.8019 49.0389C17.4437 52.7735 22.7559 54.6484 29.1789 54.7284V54.727ZM28.7483 30.9216C33.5403 30.9061 37.4319 27.023 37.4501 22.2394C37.4683 17.4615 33.515 13.511 28.7245 13.518C23.9297 13.5264 19.975 17.5008 20.0227 22.2633C20.0718 27.0636 23.9746 30.937 28.7483 30.9216V30.9216Z" fill="#FDC700"/>
                                    </svg>                                        
                                </div>
                                <div>
                                    <h1 class="text-base font-bold my-4">DIAGNOSTICO REMOTO</h1>
                                    <p class="text-sm text-justify">Si tienes algun inconveniente al momento de acceder al vehículo mediante
                                       el scaáner para diagnósticar, nosotros te ayudamos con los software requeridos para un diagnóstico avanzado.
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li class="swiper-slide">
                            <a href="" class="bg-theme-lwgray flex flex-col h-full p-5 rounded-2xl shadow-xl">
                                <div>
                                    <svg class="w-16 h-16" viewBox="0 0 58 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.689 2.92822C21.9727 1.5095 23.2184 0.488281 24.6652 0.488281H33.2882C34.735 0.488281 35.9807 1.5095 36.2645 2.92822L37.1554 7.38269C37.6718 7.57564 38.1795 7.7863 38.6779 8.01394L42.4575 5.49418C43.6613 4.69163 45.2643 4.85036 46.2873 5.87341L52.3847 11.9708C53.4078 12.9938 53.5665 14.5968 52.7639 15.8006L50.2445 19.5798C50.4724 20.0786 50.6833 20.5868 50.8764 21.1038L55.3309 21.9947C56.7496 22.2784 57.7708 23.5241 57.7708 24.9709V33.5939C57.7708 35.0407 56.7496 36.2864 55.3309 36.5701L50.8764 37.461C50.6834 37.9777 50.4726 38.4857 50.2448 38.9843L52.7649 42.7645C53.5675 43.9683 53.4088 45.5712 52.3857 46.5943L46.2883 52.6917C45.2653 53.7147 43.6623 53.8735 42.4585 53.0709L38.6782 50.5507C38.1798 50.7784 37.6719 50.9891 37.1554 51.1821L36.2645 55.6366C35.9807 57.0553 34.735 58.0765 33.2882 58.0765H24.6652C23.2184 58.0765 21.9727 57.0553 21.689 55.6366L20.7981 51.1821C20.2813 50.989 19.7732 50.7782 19.2745 50.5504L15.4935 53.071C14.2897 53.8736 12.6867 53.7149 11.6637 52.6918L5.5663 46.5944C4.54325 45.5714 4.38453 43.9684 5.18707 42.7646L7.70808 38.9831C7.48052 38.4849 7.26992 37.9773 7.07703 37.461L2.62255 36.5701C1.20384 36.2864 0.182617 35.0407 0.182617 33.5939V24.9709C0.182617 23.5241 1.20384 22.2784 2.62255 21.9946L7.07703 21.1038C7.27001 20.5872 7.48072 20.0794 7.70841 19.581L5.18809 15.8005C4.38554 14.5967 4.54426 12.9937 5.56731 11.9707L11.6647 5.87328C12.6877 4.85023 14.2907 4.69151 15.4945 5.49406L19.2748 8.01428C19.7734 7.78651 20.2814 7.57573 20.7981 7.38269L21.689 2.92822ZM24.9306 3.84719L23.7112 9.94444L22.7768 10.2486C21.7828 10.5721 20.8228 10.9715 19.9036 11.4399L19.0276 11.8863L13.8521 8.43604L8.13007 14.1581L11.5804 19.3336L11.134 20.2097C10.6657 21.1287 10.2664 22.0886 9.94289 23.0825L9.63877 24.0168L3.54152 25.2363L3.54152 33.3285L9.63877 34.5479L9.94289 35.4823C10.2663 36.4759 10.6655 37.4356 11.1337 38.3545L11.5801 39.2305L8.12906 44.407L13.8511 50.129L19.0273 46.6783L19.9033 47.1247C20.8226 47.5932 21.7827 47.9926 22.7768 48.3162L23.7112 48.6203L24.9306 54.7176H33.0228L34.2423 48.6203L35.1766 48.3162C36.1705 47.9927 37.1304 47.5934 38.0495 47.1251L38.9255 46.6787L44.1009 50.1289L49.8229 44.4069L46.3728 39.2316L46.8192 38.3555C47.2876 37.4363 47.687 36.4763 48.0106 35.4823L48.3147 34.5479L54.4119 33.3285V25.2363L48.3147 24.0168L48.0106 23.0825C47.6869 22.0882 47.2875 21.128 46.8189 20.2086L46.3724 19.3325L49.8219 14.1582L44.0999 8.43617L38.9252 11.8859L38.0492 11.4396C37.1302 10.9713 36.1704 10.572 35.1766 10.2486L34.2423 9.94444L33.0228 3.84719H24.9306ZM28.9768 22.5646C25.2666 22.5646 22.2589 25.5722 22.2589 29.2824C22.2589 32.9925 25.2666 36.0002 28.9768 36.0002C32.6869 36.0002 35.6946 32.9925 35.6946 29.2824C35.6946 25.5722 32.6869 22.5646 28.9768 22.5646ZM18.9 29.2824C18.9 23.7172 23.4115 19.2057 28.9768 19.2057C34.542 19.2057 39.0535 23.7172 39.0535 29.2824C39.0535 34.8476 34.542 39.3591 28.9768 39.3591C23.4115 39.3591 18.9 34.8476 18.9 29.2824ZM15.8839 29.2824C15.8839 22.121 21.6893 16.3156 28.8507 16.3156C36.0121 16.3156 41.8175 22.121 41.8175 29.2824C41.8175 36.4437 36.0121 42.2492 28.8507 42.2492C21.6893 42.2492 15.8839 36.4437 15.8839 29.2824ZM28.8507 12.9567C19.8343 12.9567 12.525 20.266 12.525 29.2824C12.525 38.2988 19.8343 45.6081 28.8507 45.6081C37.8671 45.6081 45.1764 38.2988 45.1764 29.2824C45.1764 20.266 37.8671 12.9567 28.8507 12.9567Z" fill="#FDC700"/>
                                    </svg> 
                                </div>
                                <div>
                                    <h1 class="text-base font-bold my-4">INSTALACIÓN Y REPROGRAMACIÓN DE SOFTWARE</h1>
                                    <p class="text-sm text-justify">Contamos con paquetes de diagnóstico y catálogo de partes de las ultimas actualizaciones
                                        y software únicos en el mercado
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li class="swiper-slide">
                            <a href="" class="bg-theme-lwgray flex flex-col h-full p-5 rounded-2xl shadow-xl">
                                <div>
                                    <svg class="w-16 h-16" viewBox="0 0 60 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.50577 26.3819C7.50577 13.844 17.6697 3.68011 30.2075 3.68011C42.7454 3.68011 52.9093 13.844 52.9093 26.3819V28.2654H50.0096V26.3819C50.0096 15.4455 41.1439 6.57981 30.2075 6.57981C19.2711 6.57981 10.4054 15.4455 10.4054 26.3819V28.2654H7.50577V26.3819ZM44.3837 24.7957C45.2709 24.7957 46.1013 25.0385 46.8123 25.4612C46.3345 16.7051 39.083 9.75211 30.2075 9.75211C21.3321 9.75211 14.0806 16.7051 13.6028 25.4612C14.3137 25.0385 15.1442 24.7957 16.0313 24.7957H16.6261C19.2541 24.7957 21.3846 26.9262 21.3846 29.5542V47.4975C21.3846 50.1255 19.2541 52.2559 16.6261 52.2559H16.0313C13.8499 52.2559 12.0114 50.7881 11.4495 48.7862H9.24062V53.5695C9.24062 54.4455 9.95076 55.1556 10.8268 55.1556H22.2785C22.3173 54.3141 23.0118 53.6438 23.8629 53.6438H27.7168C29.0103 53.6438 30.0588 54.6924 30.0588 55.9859C30.0588 57.2793 29.0103 58.3279 27.7168 58.3279H10.8268C8.19875 58.3279 6.06832 56.1975 6.06832 53.5695V48.6841C3.10838 48.147 0.86377 45.5565 0.86377 42.4416V34.61C0.86377 32.1409 2.27426 30.0011 4.33347 28.9526V26.3819C4.33347 12.092 15.9177 0.507812 30.2075 0.507812C44.4974 0.507812 56.0816 12.092 56.0816 26.3819V28.9526C58.1408 30.0011 59.5513 32.1409 59.5513 34.61V42.4416C59.5513 45.9457 56.7107 48.7862 53.2067 48.7862H48.9656C48.4037 50.7881 46.5651 52.2559 44.3837 52.2559H43.7889C41.1609 52.2559 39.0305 50.1255 39.0305 47.4975V29.5542C39.0305 26.9262 41.1609 24.7957 43.7889 24.7957H44.3837ZM9.24062 45.6139V40.2607C9.24062 39.3847 8.53048 38.6745 7.65447 38.6745C6.77846 38.6745 6.06832 39.3847 6.06832 40.2607V45.4029C4.87955 44.945 4.03607 43.7918 4.03607 42.4416V34.61C4.03607 32.858 5.45635 31.4377 7.20837 31.4377H11.2729V45.6139H9.24062ZM14.4452 29.8516V29.5542C14.4452 28.6782 15.1553 27.968 16.0313 27.968H16.6261C17.5021 27.968 18.2123 28.6782 18.2123 29.5542V47.4975C18.2123 48.3735 17.5021 49.0836 16.6261 49.0836H16.0313C15.1553 49.0836 14.4452 48.3735 14.4452 47.4975V47.2001V29.8516ZM44.3837 49.0836C45.2597 49.0836 45.9699 48.3735 45.9699 47.4975V47.2001V29.8516V29.5542C45.9699 28.6782 45.2597 27.968 44.3837 27.968H43.7889C42.9129 27.968 42.2028 28.6782 42.2028 29.5542V47.4975C42.2028 48.3735 42.9129 49.0836 43.7889 49.0836H44.3837ZM53.2067 45.6139H49.1422V31.4377H53.2067C54.9587 31.4377 56.379 32.858 56.379 34.61V42.4416C56.379 44.1936 54.9587 45.6139 53.2067 45.6139Z" fill="#FDC700"/>
                                    </svg>  
                                </div>
                                <div>
                                    <h1 class="text-base font-bold my-4">SERVICIO DE COMPRA</h1>
                                    <p class="text-sm text-justify">Nos comprometemos a estar siempre a la vanguardia con tecnología de punta a punta, 
                                        metodologías modernas y personal certificado, que aseguran la calidad de nuestros servicios.
                                    </p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="swiper-pagination flex justify-center items-center"></div>
                </div>
                
            </div>
        </div>
    </section>
</div>