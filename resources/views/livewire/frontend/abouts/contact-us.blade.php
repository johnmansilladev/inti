<div>
    @section('title') {{ __('Contáctanos') }} @endsection
    <section>
        <div class="max-w-[90%] lg:max-w-[60%] mx-auto my-6 md:my-12">
            <div class="max-w-4xl mx-auto">
                <h1 class="title-section">Contácte con nosotros</h1>
                <p class="max-w-4xl mx-auto text-base md:text-lg text-center text-theme-gray mt-2">Comuníquese con nosotros si tiene alguna pregunta sobre nuestros servicios, software disponibles, métodos de pago o medio de instalación.</p>
            </div>
            <div class="my-4 md:my-6 lg:my-10">
                <form wire:submit.prevent="store" action="/about/contact" method="POST">
                    @csrf
                    <div class="grid grid-cols-12 gap-3 lg:gap-6">
                        <div class="col-span-12 sm:col-span-6">
                            <label for="contact-name" class="form-label">Nombres</label>
                            <input type="text" wire:model.defer="name" name="name" id="contact-name" class="form-control @error('name')border border-red-500 @enderror bg-theme-lwgray">
                            @error('name') <span class="error">*{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="contact-subject" class="form-label">Asunto</label>
                            <input type="text" wire:model.defer="subject" name="subject" id="contact-subject" class="form-control @error('subject')border border-red-500 @enderror bg-theme-lwgray">
                            @error('subject') <span class="error">*{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-3">
                            <label for="contact-medium" class="form-label text-black">{{ __('Medio de contacto') }}</label>
                            <select id="contact-medium" wire:model="contact_medium" name="contact-medium" class="form-control @error('contact_medium')border border-red-500 @enderror bg-theme-lwgray">
                                <option value="whatsapp">WhatsApp</option>
                                {{-- <option value="email">Email</option> --}}
                                <option value="facebook">Facebook</option>
                                <option value="skype">Skype</option>
                                <option value="telegram">Telegram</option>
                                <option value="wechat">WeChat</option>
                            </select>
                        </div>

                        <div class="col-span-12 sm:col-span-3">
                            <div class="{{ ($type_contact == 'text') ? 'hidden' : '' }}">
                                <label for="phone" class="form-label text-black mb-1">{{ __('Información de contacto') }}</label>
                                <x-tel-input
                                    type="number"
                                    wire:model="phone"
                                    id="phone"
                                    name="phone"
                                    class="form-control bg-theme-lwgray" 
                                /> 
                            </div>  
                            <div class="{{ ($type_contact == 'number') ? 'hidden' : '' }}">
                                <label for="contact-info" class="form-label text-black">{{ __('Información de contacto') }}</label>
                                <input type="text" wire:model.defer="contact_info" name="contact-info" id="contact-info" class="form-control @error('name')border border-red-500 @enderror bg-theme-lwgray">
                            </div>
                            @error('contact_info') <span class="error">*{{ $message }}</span> @enderror
                        </div>

                        <div class="col-span-12 row-span-2 sm:col-span-6">
                            <label for="contact-message" class="form-label">Mensaje</label>
                            <textarea id="contact-message" wire:model.defer="contact_message" name="message" rows="5" class="form-control @error('name')border border-red-500 @enderror bg-theme-lwgray"></textarea> 
                            @error('contact_message') <span class="error">*{{ $message }}</span> @enderror               
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="contact-email" class="form-label">Correo electrónico</label>
                            <input type="text" wire:model.defer="email" name="contact-email" id="email" class="form-control @error('email')border border-red-500 @enderror bg-theme-lwgray">
                            @error('email') <span class="error">*{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-12">
                            <div class="flex">
                                <div class="flex h-5 items-center">
                                    <input id="contact-politics" wire:model.defer="privacy_policies" name="politics" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-theme-yellow focus:ring-theme-yellow @error('privacy_policies')border border-red-500 @enderror">
                                </div>
                                <div class="ml-3 text-sm">
                                <label for="contact-politics" class="font-medium text-gray-700">Acepto la <a href="/about/privacy-policy" class="font-bold hover:underline">política de privacidad de datos</a>.</label>
                                </div>
                            </div>
                            @error('privacy_policies') <span class="error">*{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="px-4 py-3 text-center sm:px-6 mt-8">
                        <button type="submit" class="btn btn-gray disbaled:opacity-75" wire:loading.attr="disabled">
                            <svg wire:loading wire:target="store" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Enviar datos
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section>
        <div class="max-w-[90%] lg:max-w-[60%] mx-auto py-5 lg:py-10 border-t-2 border-theme-gray">
            <div class="row">
                <div class="w-full lg:w-2/5">
                    <h1 class="title-section">Atención las 24 horas</h1>
                    <p class="md:max-w-4xl mx-auto text-base md:text-lg text-center text-theme-gray mt-2">Resolvemos y solucionamos tus dudas todo el día</p>
                </div>
                <ul role="list" class="w-full lg:w-3/5 lg:pl-6 grid grid-cols-5 gap-2 lg:gap-12">
                    <li>
                        <a href="https://api.whatsapp.com/send?phone=51930825355" class="flex flex-col items-center lg:bg-theme-gray rounded-lg transition duration-500 lg:hover:scale-105 p-4 lg:hover:bg-gradient-to-r lg:hover:from-theme-yellow lg:hover:to-theme-orange group"  target="_blank" rel="noopener noreferrer">
                            <div class="bg-theme-yellow lg:bg-theme-gray group-hover:lg:bg-transparent p-3 lg:p-0 rounded-full lg:rounded-none">
                                <svg class="h-6 w-6" viewBox="0 0 37 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.365723 36C1.01788 33.6053 1.65005 31.2833 2.28268 28.9609C2.45652 28.3231 2.64339 27.6881 2.79632 27.0453C2.8349 26.8829 2.81769 26.666 2.73913 26.5223C1.06156 23.4641 0.294131 20.1848 0.555365 16.7138C0.995559 10.8629 3.67996 6.25723 8.51372 2.96859C11.7368 0.775862 15.3527 -0.235594 19.2336 0.0461958C26.2618 0.556589 31.4684 4.02204 34.4094 10.4262C37.2783 16.6736 36.5875 22.7984 32.5872 28.4029C29.7132 32.4291 25.7184 34.7786 20.827 35.5111C17.0424 36.0779 13.446 35.4257 10.0407 33.6762C9.88496 33.5964 9.65533 33.5815 9.48288 33.6258C6.58142 34.3764 3.68321 35.1416 0.784534 35.9025C0.667397 35.9333 0.548866 35.9575 0.366188 36H0.365723ZM4.63378 31.7596C4.74441 31.7386 4.79183 31.7326 4.83831 31.7204C6.47358 31.2894 8.11117 30.8648 9.74273 30.4197C10.0788 30.3283 10.3437 30.3651 10.6477 30.5471C13.9313 32.5108 17.4686 33.1583 21.2073 32.3899C29.115 30.764 34.19 23.2616 32.8373 15.2838C31.6887 8.51014 25.8593 3.32456 19.0388 3.03624C15.2672 2.87669 11.8758 3.96139 8.95902 6.37386C5.62619 9.13017 3.80686 12.7085 3.54051 17.0357C3.34435 20.2221 4.14246 23.1772 5.85954 25.8696C6.05802 26.1808 6.09799 26.4476 5.9962 26.8036C5.53044 28.4327 5.09489 30.0712 4.63424 31.7601L4.63378 31.7596Z" fill="white"/>
                                    <path d="M12.5072 9.63472C13.3146 9.42478 13.6809 9.91791 13.9518 10.6257C14.3483 11.6618 14.7862 12.6826 15.2222 13.7029C15.3691 14.0463 15.3645 14.3556 15.1427 14.6551C14.7862 15.1361 14.439 15.6246 14.0625 16.0893C13.8259 16.3813 13.7887 16.6449 13.9825 16.9738C15.4333 19.4362 17.4669 21.2142 20.1197 22.2733C20.4641 22.4109 20.749 22.3582 20.9852 22.0638C21.4375 21.4993 21.9079 20.9483 22.3406 20.3693C22.5916 20.0334 22.8854 19.9303 23.247 20.1006C24.5077 20.6926 25.7669 21.2884 27.0094 21.9173C27.16 21.9933 27.2915 22.2789 27.2883 22.465C27.2562 24.3568 26.7017 25.2708 24.6755 26.1227C23.5287 26.6046 22.3415 26.4861 21.1613 26.1563C16.891 24.9615 13.7427 22.2663 11.2214 18.7178C10.4289 17.6023 9.7126 16.4509 9.41139 15.0951C8.98235 13.1627 9.45787 11.4878 10.8765 10.0943C11.3246 9.65432 11.8662 9.54795 12.5081 9.63659L12.5072 9.63472Z" fill="white"/>
                                </svg>
                            </div>
                            <span class="hidden lg:block text-theme-gray lg:text-white text-xs lg:text-sm font-medium lg:font-bold mt-3">WhatsApp</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/IntiDieselpe" class="flex flex-col items-center lg:bg-theme-gray rounded-lg transition duration-500 lg:hover:scale-105 p-4 lg:hover:bg-gradient-to-r lg:hover:from-theme-yellow lg:hover:to-theme-orange group" target="_blank" rel="noopener noreferrer">
                            <div class="bg-theme-yellow lg:bg-theme-gray group-hover:lg:bg-transparent p-3 lg:p-0 rounded-full lg:rounded-none">
                                <svg class="h-6 w-6" viewBox="0 0 37 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M36.3585 17.7314C36.2717 18.3194 36.2029 18.9108 36.0949 19.4951C35.4074 23.2118 33.5794 26.2829 30.7329 28.7181C26.6596 32.2035 21.9062 33.6058 16.5954 33.1466C15.7953 33.0775 15.0016 32.9274 14.2079 32.7958C13.9659 32.7559 13.7697 32.7744 13.5499 32.9047C11.9233 33.8704 10.2694 34.7917 8.6612 35.7881C7.75715 36.3483 6.86003 35.725 6.89281 34.769C6.95145 33.071 6.89281 31.3693 6.92051 29.67C6.92744 29.2288 6.79446 28.9484 6.46295 28.6607C4.60082 27.0456 3.01019 25.2022 1.9016 22.9759C0.648022 20.4609 0.251403 17.8074 0.582919 15.0208C1.42141 7.97731 6.81293 1.75682 14.695 0.348955C15.4517 0.213637 16.2219 0.155246 16.9856 0.0588543C17.0881 0.0458786 17.1887 0.0199271 17.2908 0C17.9917 0 18.693 0 19.3939 0C19.8677 0.0542201 20.3432 0.0977816 20.8151 0.164051C24.1908 0.637666 27.2538 1.88148 29.9484 3.98309C33.1015 6.442 35.2171 9.58399 36.0422 13.5416C36.1849 14.2265 36.2551 14.9268 36.359 15.62V17.7309L36.3585 17.7314ZM9.01165 33.1058C9.17048 33.0214 9.28176 32.9677 9.38795 32.9051C10.5778 32.21 11.7723 31.5223 12.9529 30.8119C13.3408 30.5783 13.7198 30.5287 14.1548 30.6297C16.1836 31.1006 18.2364 31.2739 20.3104 31.032C24.8875 30.4986 28.6889 28.5161 31.4975 24.8087C33.6671 21.9448 34.5721 18.6791 34.1607 15.0945C33.7683 11.6768 32.2155 8.81795 29.6677 6.55693C25.2564 2.64149 20.1101 1.24567 14.3722 2.59839C8.55639 3.96965 4.69594 7.58943 3.04574 13.3956C2.01749 17.0149 2.55032 20.4512 4.68855 23.5904C5.71173 25.0923 6.96438 26.3839 8.36986 27.5234C8.82789 27.8946 9.03566 28.3154 9.02042 28.9118C8.98903 30.1654 9.01073 31.4203 9.01073 32.6748C9.01073 32.7995 9.01073 32.9241 9.01073 33.1053L9.01165 33.1058Z" fill="white"/>
                                    <path d="M15.6787 18.8291C13.2902 20.0998 10.9447 21.3566 8.58621 22.5884C8.32534 22.7247 7.97212 22.8085 7.69139 22.7562C6.91247 22.6102 6.63867 21.6551 7.1715 21.0392C7.485 20.6768 7.82529 20.3376 8.15312 19.9872C10.6238 17.3481 13.0949 14.7093 15.5651 12.0702C16.2522 11.3361 16.7453 11.3134 17.4767 11.9872C18.6896 13.1045 19.9049 14.2195 21.1104 15.3447C21.2656 15.4893 21.3791 15.5074 21.5648 15.41C23.7866 14.2445 26.0116 13.0855 28.238 11.9288C28.4227 11.8329 28.6157 11.7323 28.8166 11.692C29.257 11.604 29.6947 11.8361 29.9034 12.2277C30.1218 12.6374 30.0711 13.0883 29.7261 13.4609C29.0423 14.1991 28.3451 14.9244 27.6521 15.6533C25.5397 17.8745 23.4273 20.0952 21.3136 22.3155C20.6953 22.9652 20.1685 22.9828 19.5022 22.3674C18.2653 21.2246 17.0334 20.0762 15.7988 18.9306C15.7568 18.8917 15.7106 18.857 15.6778 18.8291H15.6787ZM13.2011 17.6729L13.2598 17.7378C13.8642 17.3874 14.4889 17.0672 15.0679 16.6789C15.6704 16.2748 16.1488 16.285 16.6585 16.7855C17.5099 17.6206 18.3673 18.4491 19.2298 19.2731C19.589 19.616 19.9667 19.939 20.3453 20.2792C21.4886 19.0762 22.6045 17.9018 23.721 16.7271C23.0487 17.007 22.4152 17.3444 21.7795 17.6776C21.2005 17.9811 20.8329 17.9389 20.3477 17.4964C19.5443 16.7637 18.7482 16.0227 17.9481 15.2863C17.5034 14.8771 17.0574 14.4698 16.5943 14.0453C15.4479 15.271 14.324 16.4727 13.2007 17.6738L13.2011 17.6729Z" fill="white"/>
                                </svg>   
                            </div> 
                            <span class="hidden lg:block text-theme-gray lg:text-white text-xs lg:text-sm font-medium lg:font-bold mt-3">Messenger</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex flex-col items-center lg:bg-theme-gray rounded-lg transition duration-500 lg:hover:scale-105 p-4 lg:hover:bg-gradient-to-r lg:hover:from-theme-yellow lg:hover:to-theme-orange group" target="_blank" rel="noopener noreferrer">
                            <div class="bg-theme-yellow lg:bg-theme-gray group-hover:lg:bg-transparent p-3 lg:p-0 rounded-full lg:rounded-none">
                                <svg class="h-6 w-6" viewBox="0 0 42 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M41.0048 23.7081C40.9047 24.2436 40.8433 24.7895 40.6983 25.3123C40.1511 27.2829 39.0222 28.8772 37.4796 30.1902C37.2259 30.4063 36.9582 30.6059 36.6638 30.8394C36.8047 31.1259 36.9428 31.4096 37.0837 31.6924C37.4712 32.4703 37.8657 33.2445 38.2463 34.0257C38.5533 34.6566 38.4873 35.1799 38.067 35.621C37.6781 36.0296 37.1455 36.1137 36.5164 35.8446C34.8498 35.131 33.1714 34.4414 31.5277 33.6776C30.8032 33.3408 30.104 33.3051 29.3284 33.3629C25.0408 33.6823 21.2138 32.5779 18.0864 29.4987C17.1068 28.5343 16.3631 27.3872 15.9218 26.0691C15.8249 25.7792 15.6873 25.6956 15.3812 25.6923C13.7627 25.6759 12.1593 25.5096 10.5951 25.0699C10.2965 24.9858 10.0414 24.9938 9.75126 25.122C8.40989 25.7149 7.0615 26.2922 5.70937 26.8587C4.86504 27.2124 4.02726 26.8197 3.88873 25.9695C3.83771 25.6543 3.93787 25.278 4.07266 24.9755C4.43632 24.1595 4.85521 23.3689 5.23853 22.5957C4.56457 21.9714 3.88264 21.4077 3.27982 20.7693C0.834839 18.1787 -0.338976 15.1145 0.0859939 11.535C0.414082 8.77193 1.69601 6.45418 3.67484 4.53432C6.32154 1.96666 9.53222 0.588417 13.1604 0.145443C16.9102 -0.312094 20.4771 0.30046 23.7996 2.11651C26.6527 3.67561 28.8216 5.90129 30.0258 8.97815C30.4718 10.1182 30.7054 11.3128 30.7452 12.5412C30.7503 12.7004 30.7461 12.8602 30.7461 13.0391C31.296 13.1702 31.8282 13.2782 32.3496 13.4243C34.7637 14.0998 36.889 15.2719 38.5851 17.1546C39.889 18.6019 40.7202 20.2775 40.9426 22.2345C40.9529 22.3252 40.9833 22.4135 41.0043 22.5032V23.709L41.0048 23.7081ZM28.2487 12.7479C28.1158 12.0188 28.0479 11.2372 27.8265 10.5025C26.9522 7.59708 24.9767 5.61662 22.3609 4.25106C19.1516 2.57593 15.7402 2.17946 12.2126 2.89865C9.02535 3.54878 6.28738 5.01064 4.31698 7.68399C1.83362 11.053 1.96841 15.2944 4.76581 18.593C5.55163 19.5193 6.48114 20.2723 7.47944 20.9521C8.21846 21.4556 8.36121 22.0156 7.99943 22.8203C7.9662 22.8945 7.95262 22.9772 7.91237 23.1167C8.46511 22.8799 8.95608 22.6751 9.4419 22.459C9.82568 22.2885 10.2043 22.2829 10.6106 22.3928C11.2784 22.5737 11.9505 22.7573 12.6324 22.864C13.5226 23.003 14.4241 23.0683 15.3451 23.1679C15.3667 22.9584 15.3849 22.8287 15.3924 22.6981C15.4888 21.023 16.0341 19.4996 17.0029 18.1448C18.8998 15.4926 21.547 13.9824 24.6645 13.2731C25.8014 13.0147 26.9771 12.9283 28.2482 12.7474L28.2487 12.7479ZM34.3031 32.0941C34.3274 32.0715 34.3513 32.049 34.3757 32.0264C34.2549 31.7775 34.1365 31.5271 34.0134 31.2795C33.4962 30.2367 33.6292 29.7247 34.6181 29.1018C35.6342 28.4624 36.5478 27.7122 37.2386 26.7192C38.4012 25.0492 38.7709 23.2374 38.1199 21.2753C37.4983 19.4014 36.1986 18.088 34.546 17.1091C32.0776 15.6472 29.3879 15.2019 26.5703 15.5363C23.9854 15.8431 21.6574 16.7722 19.8298 18.7034C18.3176 20.3015 17.6151 22.1823 18.0906 24.4019C18.4879 26.257 19.5939 27.6376 21.1 28.6978C23.7477 30.5613 26.714 31.1348 29.8873 30.7224C30.5149 30.6407 31.0887 30.6703 31.6714 30.9479C32.5344 31.3594 33.4242 31.7145 34.3026 32.0936L34.3031 32.0941Z" fill="white"/>
                                    <path d="M10.2949 7.71488C11.01 7.72005 11.5918 8.31475 11.5749 9.0236C11.5586 9.72353 10.981 10.2891 10.2869 10.2844C9.57552 10.2792 8.99564 9.68266 9.01155 8.97193C9.027 8.26261 9.59145 7.70971 10.2949 7.71488Z" fill="white"/>
                                    <path d="M21.828 9.0034C21.8252 9.70098 21.2538 10.2778 20.5597 10.2835C19.8478 10.2891 19.26 9.70286 19.2642 8.99166C19.2684 8.28234 19.8253 7.72005 20.5279 7.71488C21.2435 7.70971 21.8309 8.2922 21.828 9.00387V9.0034Z" fill="white"/>
                                    <path d="M25.6728 20.5825C25.6695 21.2805 25.0976 21.8564 24.4035 21.8616C23.6916 21.8668 23.1043 21.28 23.1094 20.5684C23.1146 19.8567 23.6692 19.2972 24.3735 19.293C25.0892 19.2883 25.6765 19.8713 25.6728 20.5829V20.5825Z" fill="white"/>
                                    <path d="M32.0907 21.8581C31.3807 21.8619 30.7924 21.2709 30.7994 20.5612C30.8064 19.8518 31.3652 19.2914 32.0677 19.2891C32.7824 19.2867 33.3693 19.8725 33.3632 20.5823C33.3572 21.2803 32.7848 21.8544 32.0907 21.8581Z" fill="white"/>
                                </svg>
                            </div>
                            <span class="hidden lg:block text-theme-gray lg:text-white text-xs lg:text-sm font-medium lg:font-bold mt-3">WeChat</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://t.me/IntiDiesel" class="flex flex-col items-center lg:bg-theme-gray rounded-lg transition duration-500 lg:hover:scale-105 p-4 lg:hover:bg-gradient-to-r lg:hover:from-theme-yellow lg:hover:to-theme-orange group" target="_blank" rel="noopener noreferrer">
                            <div class="bg-theme-yellow lg:bg-theme-gray group-hover:lg:bg-transparent p-3 lg:p-0 rounded-full lg:rounded-none">
                                <svg class="h-6 w-6" viewBox="0 0 41 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40.9995 1.58595C40.7604 2.72244 40.5116 3.8566 40.2832 4.99542C38.9073 11.8633 37.536 18.7317 36.1633 25.6001C35.5582 28.628 34.926 31.6507 34.359 34.686C34.1185 35.9727 33.0328 36.2171 32.1602 35.7063C28.8213 33.7515 25.449 31.8536 22.0892 29.9343C21.9631 29.8624 21.8357 29.792 21.6789 29.7043C21.0872 30.4922 20.5035 31.2695 19.9202 32.0472C19.0778 33.1697 18.2424 34.2983 17.3907 35.4138C16.8799 36.0828 16.024 36.2059 15.4789 35.6442C15.2514 35.4096 15.0649 35.0195 15.0626 34.6986C15.0347 30.803 15.0449 26.9074 15.0435 23.0113C15.0435 22.5597 15.2616 22.2312 15.5877 21.9429C17.1692 20.5438 18.7452 19.139 20.323 17.7357C20.4118 17.6564 20.4983 17.5742 20.5532 17.4408C20.2634 17.6078 19.9732 17.7739 19.6843 17.9423C17.1707 19.4063 14.6528 20.8629 12.1474 22.3409C11.5972 22.6656 11.0962 22.6833 10.5264 22.3959C7.31126 20.7742 4.08912 19.1675 0.86561 17.563C0.313008 17.2883 -0.0376972 16.8903 0.00323634 16.2488C0.0427744 15.6297 0.41954 15.2826 0.982375 15.0629C13.6815 10.0994 26.3774 5.12932 39.0747 0.160675C39.9604 -0.185963 40.4316 0.0076506 41 0.943528V1.58595H40.9995ZM4.46778 16.462C4.56453 16.5227 4.61521 16.5609 4.67103 16.5889C6.79446 17.6498 8.91604 18.7145 11.0478 19.7572C11.1832 19.8234 11.4311 19.7698 11.5772 19.6853C14.6714 17.8943 17.7586 16.0907 20.8477 14.2893C24.121 12.3807 27.3933 10.4707 30.6685 8.56584C31.3071 8.19448 31.9551 8.32091 32.3742 8.87516C32.8054 9.4448 32.7319 10.1106 32.1779 10.6349C32.0714 10.7362 31.9602 10.8323 31.8504 10.9303C27.1859 15.075 22.5199 19.2179 17.8633 23.3715C17.7274 23.4928 17.6181 23.7246 17.6167 23.9056C17.6 26.0872 17.6056 28.2692 17.607 30.4512C17.607 30.5468 17.626 30.642 17.6437 30.8044C18.5145 29.6431 19.3387 28.5416 20.1658 27.442C20.7551 26.6582 21.324 26.5393 22.1738 27.024C24.387 28.2864 26.5988 29.5517 28.8116 30.8151C29.8982 31.4356 30.9857 32.0547 32.1258 32.705C34.0845 22.9143 36.034 13.1687 37.9993 3.34527C26.7686 7.7382 15.6384 12.0919 4.4673 16.462H4.46778Z" fill="white"/>
                                </svg>
                            </div>    
                            <span class="hidden lg:block text-theme-gray lg:text-white text-xs lg:text-sm font-medium lg:font-bold mt-3">Telegram</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://join.skype.com/invite/nQLQCcAsXmOd" class="flex flex-col items-center lg:bg-theme-gray rounded-lg transition duration-500 lg:hover:scale-105 p-4 lg:hover:bg-gradient-to-r lg:hover:from-theme-yellow lg:hover:to-theme-orange group" target="_blank" rel="noopener noreferrer">
                            <div class="bg-theme-yellow lg:bg-theme-gray group-hover:lg:bg-transparent p-3 lg:p-0 rounded-full lg:rounded-none">
                                <svg class="h-6 w-6" viewBox="0 0 37 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.2039 0C10.7644 0 11.3245 0 11.885 0C11.9159 0.0152924 11.946 0.0412432 11.9778 0.0440236C13.4119 0.178412 14.7651 0.582039 16.0381 1.26093C16.1235 1.30634 16.2403 1.32303 16.3377 1.31237C17.7819 1.1511 19.2248 1.14925 20.6676 1.32812C25.0345 1.86985 28.6949 3.7902 31.5718 7.11885C34.8559 10.9183 36.1141 15.3772 35.567 20.3561C35.4968 20.996 35.4645 21.5957 35.7637 22.1902C35.8929 22.447 35.9599 22.7417 36.0181 23.0271C36.1349 23.5971 36.2263 24.1722 36.3279 24.745V26.3618C36.2494 26.8215 36.1921 27.2868 36.0887 27.7409C34.6246 34.1637 27.8038 37.7028 21.7351 35.1828C21.3842 35.0372 21.0628 34.9965 20.6898 35.0544C20.126 35.142 19.5531 35.198 18.9829 35.2082C14.8155 35.2828 11.0345 34.0914 7.81781 31.4315C2.83828 27.3141 0.721348 22.0044 1.59952 15.5431C1.6226 15.3726 1.59397 15.1701 1.52056 15.0148C0.684407 13.2506 0.336746 11.404 0.521429 9.45442C0.922654 5.21286 3.97916 1.54361 8.08237 0.423554C8.77631 0.23402 9.49566 0.139022 10.2035 0.000463406L10.2039 0ZM32.9551 18.521C32.871 17.5562 32.859 16.8013 32.733 16.0668C31.9185 11.3326 29.3694 7.83574 25.1453 5.60259C22.2734 4.08447 19.198 3.70864 16.0062 4.20541C15.7324 4.24805 15.5011 4.23229 15.2518 4.06917C14.2092 3.38843 13.0633 3.00148 11.8231 2.85783C8.59763 2.48432 5.33982 4.2828 3.98609 7.26251C2.86321 9.73432 3.05713 12.1487 4.42471 14.4842C4.51936 14.646 4.57385 14.8823 4.53783 15.0616C4.20771 16.703 4.06827 18.3472 4.30836 20.0164C4.88827 24.0517 6.82375 27.2831 10.1065 29.6543C13.4853 32.0946 17.2588 32.8921 21.3588 32.1164C21.5643 32.0775 21.8237 32.1229 22.0107 32.2207C23.7311 33.1206 25.5368 33.4121 27.4354 32.9992C32.3807 31.9231 35.03 26.5217 32.6402 21.9687C32.5617 21.819 32.5414 21.6119 32.5626 21.44C32.6919 20.3978 32.841 19.3579 32.9555 18.521H32.9551Z" fill="white"/>
                                    <path d="M18.7342 7.78516C20.52 7.7972 22.2496 8.05718 23.8333 8.94136C25.0891 9.64249 26.001 10.6374 26.4849 12.0314C26.947 13.3627 25.754 14.7108 24.5789 14.7627C23.7816 14.7979 23.1338 14.5634 22.6855 13.8748C22.5386 13.6496 22.371 13.4345 22.2528 13.195C21.5173 11.7042 20.3326 10.9706 18.6737 11.0721C18.0028 11.1133 17.3144 11.1527 16.6763 11.3399C16.2072 11.4776 15.7561 11.7973 15.3877 12.1356C14.8073 12.6685 14.8258 13.3544 15.3577 13.9434C15.914 14.5597 16.6625 14.8373 17.4331 15.0393C19.1008 15.4772 20.7832 15.8614 22.4445 16.323C23.1467 16.5181 23.8277 16.8165 24.4884 17.1316C28.3109 18.9533 27.9679 23.4427 26.073 25.5461C25.0088 26.7278 23.6708 27.429 22.155 27.79C19.5574 28.4086 16.9626 28.3942 14.4375 27.4674C12.4909 26.7528 11.0887 25.4196 10.3902 23.42C10.2877 23.1262 10.2364 22.8046 10.2161 22.4928C10.1579 21.5998 10.5938 20.894 11.3962 20.5228C12.2088 20.1475 13.1263 20.2679 13.7316 20.8852C13.9961 21.1554 14.1997 21.4941 14.3932 21.8245C14.6231 22.217 14.7981 22.641 15.0216 23.0377C15.6102 24.0827 16.5073 24.6564 17.6999 24.7639C18.8002 24.8631 19.8907 24.8547 20.9476 24.472C21.4846 24.2773 21.9477 23.9696 22.3184 23.5317C23.0354 22.6837 22.9279 21.489 22.0802 20.7772C21.4619 20.2582 20.7186 20.0237 19.9586 19.8291C18.3786 19.4245 16.7894 19.0557 15.2192 18.6173C14.1822 18.3277 13.2057 17.8758 12.3644 17.1752C9.75532 15.0018 10.0037 11.1968 12.8825 9.27872C14.1997 8.40102 15.6837 8.03169 17.2327 7.87969C17.7313 7.83057 18.2337 7.8162 18.7342 7.78608V7.78516Z" fill="white"/>
                                </svg>  
                            </div>  
                            <span class="hidden lg:block text-theme-gray lg:text-white text-xs lg:text-sm font-medium lg:font-bold mt-3">Skype</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    @push('script')
        <script>
            const inputPhone = document.querySelector('#phone');
            inputPhone.addEventListener('telchange', function(e) {
                @this.set('phone', e.detail.number);
                @this.set('contact_info',e.detail.number);
                @this.set('validPhone', e.detail.valid);
            });

            window.livewire.on('reset-Input-phone', () => {
                document.querySelectorAll(".iti--laravel-tel-input")[0].value= '';
            });
        </script>
    @endpush
</div>