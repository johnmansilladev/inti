<section>
    <div class="bg-image-newsletter">
        <div class="bg-layer-newsletter">
            <div class="max-w-[85%] md:max-w-[50%] lg:max-w-[60%] mx-auto py-16">
                <div class="grid grid-cols-2 gap-4 md:gap-40">
                    <div class="my-auto col-span-2 md:col-span-1 text-white">
                        <h1 class="text-3xl md:text-5xl font-extrabold text-center">¡Suscríbete!</h1>
                        <p class="mt-3 max-w-3xl text-base text-center md:text-left font-bold">Entérate de todas nuestras promociones y últimas novedades</p>
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <div class="flex">
                            <label for="subscriber-name" class="sr-only">Nombres y apellidos</label>
                            <input type="text" wire:model="name" id="subscriber-name" placeholder="Nombre" class="form-control @error('name')border border-red-500 @enderror border-none placeholder:font-semibold">
                        </div>
                        @error('name') <span class="error italic text-xs text-red-600">*{{ $message }}</span> @enderror
                        <div class="flex mt-3">
                            <label for="subscriber-email" class="sr-only">Correo Electrónico</label>
                            <input type="email" wire:model="email" id="subscriber-email" placeholder="Correo" class="form-control @error('email')border border-red-500 @enderror border-none placeholder:font-semibold">
                        </div>
                        @error('email') <span class="error italic text-xs text-red-600">*{{ $message }}</span> @enderror
                        <div class="flex mt-4">
                            <div class="flex items-center h-5">
                                <input id="subscriber-terms-policy" wire:model="terms_policy" aria-describedby="subscriber-terms-policy" type="checkbox" class="w-4 h-4 text-theme-yellow bg-transparent rounded border-2 border-white focus:ring-theme-yellow dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            </div>
                            <div class="ml-2 text-sm">
                                <label for="subscriber-terms-policy" class="text-sm text-white">Aceptar la política de protección de datos.</label>
                            </div>
                        </div>
                        @error('terms_policy') <span class="error italic text-xs text-red-600">*{{ $message }}</span> @enderror
                        <div class="flex mt-3">
                            <div class="flex items-center h-5">
                                <input id="subscriber-terms-conditions"  wire:model="terms_conditions" aria-describedby="subscriber-terms-conditions" type="checkbox" class="w-4 h-4 text-theme-yellow bg-transparent rounded border-2 border-white focus:ring-theme-yellow dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            </div>
                            <div class="ml-2 text-sm">
                                <label for="subscriber-terms-conditions" class="text-sm text-white">Aceptar los términos y condiciones.</label>
                            </div>
                        </div>
                        @error('terms_conditions') <span class="error italic text-xs text-red-600">*{{ $message }}</span> @enderror
    
                        <div class="flex justify-center mt-4">
                            <button type="button" class="btn btn-gray-2" wire:click="subscribe"  wire:loading.attr="disabled">
                                <svg wire:loading wire:target="subscribe" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Suscribirse
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
