<x-app-layout>
    <section>
        <div class="relative">
            <picture>
                <img src="{{ Storage::url('about/banner-about.png') }}" class="w-full h-full object-center object-cover" title="Inti diesel" alt="Inti diesel">
            </picture>
        </div>
    </section>
    <section>
        <div class="max-w-screen-2xl mx-auto">
            <div class="grid grid-cols-2 gap-x-10">
                <div >
                    <h1 class="font-bold text-3xl">Conoce más sobre Inti Diesel</h1>
                    <p>
                        INTI DIESEL es un emprendimiento que brinda soluciones de software de diagnóstico,
                        reprogramamción y actualización de software para transportes de carga pesada, agrícola,
                        construcción, camiones, transporte marino, entre otros.
                    </p>
                    <p>
                        Estamos comprometidos con la satisfacción de nuestros clientes, brindando un servicio de 24
                        horas y ofreciendo los software más comerciales y únicos en el mercado peruano.
                    </p>
                    <p>
                        Contamos con un grupo de profesionales , técnicos e ingenieros con más de 3 años de experiencia
                        en el rubro. Años que nos dio la experiencia necesaria para obtener una mejor visión sobre el
                        sector y las necesidades de esta, comprendiendo las capacidades de nuestro personal para brindar
                        mejor soluciones y servicios a nuestros clientes.
                    </p>
                </div>
                <div>
                    <img src="{{ Storage::url('about/banner-about-2.png') }}" class="w-full h-full object-center object-cover" title="Procesos de Inti Diesel" alt="Procesos de Inti Diesel">
                </div>
            </div>
            
        </div>
    </section>
</x-app-layout>
