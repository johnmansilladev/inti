@section('title') {{ 'Chekout' }} @endsection
<div x-data>
        <section>
            <div class="max-w-[90%] md:max-w-[70%] mx-auto my-4 md:my-8">
                <div class="row md:justify-between md:my-10 space-y-4 md:space-y-0">
                    <div class="w-full md:w-[65%]" {{ !$auth ? 'hidden' : '' }} >
                        <div class="w-full bg-white shadow-[0_4px_6px_4px_rgba(0,0,0,0.1),0_2px_4px_-2px_rgb(0,0,0,0.1)] h-fit rounded-lg p-4 md:p-8">
                            <div class="flex border-b pb-3">
                                <h1 class="font-bold text-sm md:text-base text-theme-gray uppercase">{{__('Datos de la compra')}}</h1>
                            </div>
                            <div class="my-4">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="first-name" class="form-label text-black">{{ __('Nombres') }}</label>
                                        <input type="text" wire:model="first_name" name="first-name" id="first-name" class="form-control">
                                        @error('first_name') <span class="error">*{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="last-name" class="form-label text-black">{{ __('Apellidos') }}</label>
                                        <input type="text" wire:model="last_name" name="last-name" id="last-name" class="form-control">
                                        @error('last_name') <span class="error">*{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="contact-medium" class="form-label text-black">{{ __('Medio de contacto') }}</label>
                                        <select wire:model="contact_medium" id="contact-medium" name="contact-medium" class="form-control">
                                            <option value="whatsapp">WhatsApp</option>
                                            {{-- <option value="email">Email</option> --}}
                                            <option value="facebook">Facebook</option>
                                            <option value="skype">Skype</option>
                                            <option value="telegram">Telegram</option>
                                            <option value="wechat">WeChat</option>
                                        </select>
                                        @error('contact_medium') <span class="error">*{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <div class="{{ ($type_contact == 'text') ? 'hidden' : '' }}">
                                            <label for="phone" class="form-label text-black mb-1">{{ __('Información de contacto') }}</label>
                                            <x-tel-input
                                                type="number"
                                                wire:model="phone"
                                                id="phone"
                                                name="phone"
                                                class="form-control"
                                            /> 
                                            <input wire:model="phone_country" type="hidden" id="phone_country" name="phone_country">
                                        </div>  
                                        <div class="{{ ($type_contact == 'number') ? 'hidden' : '' }}">
                                            <label for="contact-info" class="form-label text-black">{{ __('Información de contacto') }}</label>
                                            <input type="text" wire:model="contact_info" name="contact-info" id="contact-info" class="form-control">
                                        </div>
                                        @error('contact_info') <span class="error">*{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="email" class="form-label text-black">{{ __('Correo electrónico') }}</label>
                                        <input type="email" wire:model="email" name="email" id="email" class="form-control">
                                        @error('email') <span class="error">*{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-span-6">
                                        <div class="flex items-start">
                                            <div class="flex h-5 items-center">
                                                <input id="privacy-policies" wire:model="privacy_policies" name="privacy-policies" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-theme-yellow focus:ring-transparent">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="privacy-policies" class="text-black">Sus datos personales se utilizarán para procesar su pedido, apoyar su experiencia en este sitio web y para otros fines descritos en nuestra <a class="font-bold hover:cursor-pointer ">política de privacidad</a>.</label>
                                            </div>
                                        </div>
                                        @error('privacy_policies') <span class="error">*{{ $message }}</span> @enderror
                                    </div>
                                </div>                     
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-[65%]" {{ $auth ? 'hidden' : '' }}>
                        <div class="w-full bg-white shadow-[0_4px_6px_4px_rgba(0,0,0,0.1),0_2px_4px_-2px_rgb(0,0,0,0.1)] h-fit rounded-lg p-4 md:p-8">
                            <div class="flex flex-col pb-3">
                                <h1 class="font-bold text-base text-theme-gray uppercase border-b pb-3">{{__('Compra más rápido y fácil')}}</h1>
                            </div>
                            <div class="mb-4">
                                <p class="text-sm font-medium text-theme-gray">{{ __('Para continuar tu compra elija una opcion y comienza la experiencia de comprar en Intidiesel.') }}</p>
                                <div class="mt-3">
                                    <a href="{{ route('login') }}" class="flex items-center justify-center w-fit rounded-md border border-theme-gray hover:bg-theme-yellow hover:border-theme-yellow px-4 py-2 text-xs font-bold text-theme-gray uppercase disabled:bg-theme-lwgray disabled:opacity-75">
                                        Iniciar sesión
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <a href="{{ route('register') }}" class="flex items-center justify-center w-fit rounded-md border border-theme-gray hover:bg-theme-yellow hover:border-theme-yellow px-4 py-2 text-xs font-bold text-theme-gray uppercase disabled:bg-theme-lwgray disabled:opacity-75">
                                        Registrarme
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <button wire:click="setAuth" class="flex items-center justify-center w-fit rounded-md border border-theme-gray hover:bg-theme-yellow hover:border-theme-yellow px-4 py-2 text-xs font-bold text-theme-gray uppercase disabled:bg-theme-lwgray disabled:opacity-75">
                                        continuar como invitado
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="w-full bg-white shadow-[0_4px_6px_4px_rgba(0,0,0,0.1),0_2px_4px_-2px_rgb(0,0,0,0.1)] h-fit rounded-lg p-4 md:p-8 mt-4 md:mt-8">
                            <div class="flex">
                                <h1 class="font-bold text-sm md:text-base text-theme-gray uppercase">{{__('Datos de la compra')}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-[33%] bg-white shadow-[0_4px_6px_4px_rgba(0,0,0,0.1),0_2px_4px_-2px_rgb(0,0,0,0.1)] h-fit rounded-lg p-4 md:p-8">
                        <h1 class="font-semibold text-sm md:text-base uppercase border-b pb-3 mb-2">{{ __('Resumen de la compra') }}({{ $totalQuantity }})</h1>
                        @foreach ($cartItems as $item)
                        <a href="{{ route('product.index',['product'=>$item->options->product_slug,'version'=>$item->options->sku_slug,'service'=>$item->options->service_slug]) }}">
                            <div class="flex items-center group py-2 border-b hover:bg-gray-100">
                                <div class="flex flex-row justify-start items-stretch w-full">
                                    <img class="w-16 h-auto" src="{{ Storage::url($item->options->sku_image ?? 'products/no-image.jpg') }}" title="{{ $item->name }}" alt="{{ $item->name }}">
                                    <div class="flex flex-col justify-start items-stretch w-full ml-4">
                                        <span></span>
                                        <div class="text-[11px] text-theme-gray font-bold uppercase">{{$item->name .' - '. $item->options->sku_name}}</div>
                                        <div class="text-[10px] text-theme-gray font-semibold uppercase pt-1">{{$item->options->service_name}}</div>
                                        <span class="text-[10px] text-theme-gray font-semibold pt-0.5">{{ $item->qty }} un.</span>
                                    </div>
                                    <div class="flex flex-col justify-start items-stretch">
                                        @if ($item->options->service_dcto > 0 || $item->price < $item->options->service_price)
                                        <div class="flex flex-col justify-start items-stretch">
                                            <span class="flex justify-end text-[12px] text-theme-gray font-semibold">S/.{{ number_format($item->price,2) }}</span>
                                        </div>
                                        <div class="flex flex-col justify-start items-stretch mt-0.5">
                                            <span class="flex justify-end text-[11px] text-theme-gray line-through">S/.{{ number_format($item->options->service_price,2) }}</span>
                                        </div>
                                        @else
                                        <div class="flex flex-col justify-start items-stretch">
                                            <span class="flex justify-end text-[12px] text-theme-gray font-semibold">S/.{{ number_format($item->price,2) }}</span>
                                        </div>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </a>
                        
                        @endforeach
                        <div class="flex justify-between border-b-2 pb-2 mt-10 mb-2">
                            <span class="font-semibold text-theme-gray text-xs uppercase">Subtotal</span>
                            <span class="font-semibold text-theme-gray text-xs">S/. {{ $subtotal }}</span>
                        </div>
                        <div class="flex justify-between mt-4 mb-5">
                            <span class="font-bold text-theme-gray text-sm uppercase">total</span>
                            <span class="font-bold text-theme-yellow text-sm">S/. {{ $total }}</span>
                        </div>
                        <div class="flex justify-between mt-6">
                            <button wire:click="store" {{ (!$privacy_policies) ? 'disabled' : '' }} class="flex items-center justify-center w-full rounded-md border border-transparent bg-theme-yellow px-6 py-2.5 text-sm font-bold text-theme-gray uppercase shadow hover:opacity-75 disabled:bg-theme-lwgray disabled:opacity-75">
                                Realizar compra
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @push('script')
            <script>
            const inputPhone = document.querySelector('#phone');
                inputPhone.addEventListener('telchange', function(e) {
                console.log(e);
                @this.set('phone', e.detail.number);
                @this.set('contact_info',e.detail.number);
                @this.set('validPhone', e.detail.valid);
            });

            window.livewire.on('openWhatsApp', (url) => {
                window.open(url, '_blank');
            });
            </script>
        @endpush
</div>