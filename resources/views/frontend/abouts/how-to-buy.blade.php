<x-app-layout>
    @section('title') {{ __('Cómo comprar en 4 pasos') }} @endsection

    <section>
        <div class="max-w-[90%] md:max-w-[80%] lg:max-w-[50%] mx-auto py-6 md:py-16">
            <div class="flex justify-center items-center mx-auto bg-theme-yellow w-fit rounded-lg py-2 px-6 mb-8">
                <h1 class="text-lg md:text-xl font-extrabold text-center text-theme-gray uppercase">Cómo comprar en Inti Diesel en 4 pasos</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-x-6 md:gap-y-10">
                <div class="flex">
                    <div class="text-4xl font-bold text-theme-yellow">1</div>
                    <div class="ml-4">
                        <div class="text-base font-bold text-theme-gray uppercase">BUSCA TU PRODUCTO Y AÑÁDELO A LA BOLSA</div>
                        <p class="text-sm">Agrega el Software que estabas buscando e inicia el proceso de compra.</p>
                    </div>
                </div>
                <div class="flex">
                    <div class="text-4xl font-bold text-theme-yellow">2</div>
                    <div class="ml-2">
                        <div class="text-base font-bold text-theme-gray uppercase">ELIGE TU MEDIO DE PAGO</div>
                        <p class="text-sm">Ingresa los datos correspondientes del medio de pago que escojas.</p>
                    </div>
                </div>
                <div class="flex">
                    <div class="text-4xl font-bold text-theme-yellow">3</div>
                    <div class="ml-2">
                        <div class="text-base font-bold text-theme-gray uppercase">PROGRAMA LA INSTALACIÓN</div>
                        <p class="text-sm">Coordina con nuestros instaladores la instalación del software que compraste.</p>
                    </div>
                </div>
                <div class="flex">
                    <div class="text-4xl font-bold text-theme-yellow">4</div>
                    <div class="ml-2">
                        <div class="text-base font-bold text-theme-gray uppercase">ASEGÚRATE DE QUE TODO ESTÉ CORRECTAMENTE FUNCIONANDO</div>
                        <p class="text-sm">Revisa que la información y la instalación está todo conforme.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>