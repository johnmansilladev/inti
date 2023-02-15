<x-app-layout>
    @section('title') {{ __('Términos y condiciones') }} @endsection
    <section>
        <div class="max-w-[90%] md:max-w-[80%] lg:max-w-[60%] mx-auto py-10">
            <div>
                <div class="flex justify-center">
                    <h1 class="text-xl font-extrabold text-theme-gray border-b-4 border-theme-yellow inline-flex">TÉRMINOS Y CONDICIONES</h1>
                </div>
                <p class="text-sm text-justify mt-8">
                    Este acuerdo describe los términos y condiciones generales aplicables al uso de los productos y servicios ofrecidos a través del sitio web.                
                </p>    
            </div>
          
            {{-- <div class="mt-6">
                <h5 class="text-base font-bold text-theme-gray flex items-center"><div class="w-2 h-3 bg-theme-yellow mr-2"></div> INFORMACIÓN SOBRE EL TRATAMIENTO OBLIGATORIO DE DATOS PERSONALES:</h5>
                <p class="text-sm text-justify mt-2">
                    INTI DIESEL informa al cliente que, para la prestación de los servicios y/o ejecución de las disposiciones establecidas en los Términos y Condiciones aceptados, realizará el tratamiento de su nombre, apellidos, No. de documento de identidad, dirección, correo electrónico, contraseña y/o teléfono mientras dure la relación contractual. Este tratamiento será realizado por INTI DIESEL de forma directa y/o a través de sus proveedores, así como otras empresas encargadas del procesamiento y almacenamiento de datos.
                    INTI DIESEL cumple con informarle al cliente que la información mencionada en el párrafo precedente es necesaria para el cumplimiento de las obligaciones a su cargo, las mismas que de otra forma no podrían ejecutarse. Entre los servicios y/o disposiciones mencionados se encuentran: i) la creación y gestión de cuenta de usuario, ii) la coordinación, entrega de productos y postventa (medición de satisfacción, registro de vales/cupones), iii) la atención de solicitudes y reclamos y iv) registro y envío de publicidad (promociones, ofertas y descuentos).
                </p>
            </div> --}}

            <div class="mt-6">
                {{-- <h5 class="text-base font-bold text-theme-gray flex items-center"><div class="w-2 h-3 bg-theme-yellow mr-2"></div>ADVERTENCIAS PARA LA ADQUISICIÓN DE UN KG/TOOL LOCKED PC:</h5> --}}
                <p class="text-sm text-justify">
                    Para la adquisición de los programas ofrecidos en este sitio, Es requisito que usted lea y acepte los siguientes Términos y Condiciones que a continuación se redactan.
                </p>
                <ul class="text-sm list-disc ml-6">
                    <li>Es necesario en todo momento disponer de una buena conexión a internet y electricidad.</li>
                    <li>No nos hacemos responsables si el cliente ejecuta las actualizaciones de Windows después de una instalación.</li>
                    <li>Solo se utilizarán las formas de conexión remota conocidas como ANY DESK y TEAMVIWER.</li>
                    <li>No se aceptan cambios ni devoluciones.</li>
                    <li>Para programas en formato EPC (catálogo de piezas) pueden ser muy pesados y pueden tardar de 2 a 3 días la transferencia de los archivos.</li>
                    <li>Todas las licencias son generadas por nosotros con fecha de caducidad ilimitada.</li>
                    <li>Después de la instalación, todos los archivos descargados serán eliminados.</li>
                </ul>
            </div>

            <div class="mt-6">
                <h5 class="text-base font-bold text-theme-gray flex items-center"><div class="w-2 h-3 bg-theme-yellow mr-2"></div>ADVERTENCIAS PARA LA ADQUISICIÓN DE UN KG/TOOL LOCKED PC:</h5>
                <ul class="text-sm list-disc ml-6">
                    <li>No se puede ejecutar en una máquina virtual.</li>
                    <li>Se recomienda desactivar las actualizaciones de Windows, un cambio en el sistema operativo puede hacer que la licencia deje de funcionar.</li>
                    <li>Cambiar cualquier parte del PC puede hacer que la licencia deje de funcionar.</li>
                    <li>Si la licencia deja de funcionar, la licencia no será reemplazada de ninguna manera.</li>
                </ul>
            </div>

            <div class="mt-6">
                <h5 class="text-base font-bold text-theme-gray flex items-center"><div class="w-2 h-3 bg-theme-yellow mr-2"></div>NORMAS POSVENTA:</h5>
                <p class="text-sm text-justify mt-2">
                    Queda prohibida la generación masiva y gratuita de licencias en entornos o plataformas públicas.
                </p>
            </div>
        
        </div>
    </section>
</x-app-layout>