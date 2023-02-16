<x-app-layout>
    @section('title') {{ 'Mi perfil' }} @endsection
    <section class="bg-theme-lwgray">
        <div x-data="{tabProfile:'personal_information'}" class="max-w-[90%] lg:max-w-[70%] mx-auto py-6">
            <div class="row justify-start items-stretch bg-white rounded-lg shadow-lg p-1">
                <div class="row justify-start items-stretch px-4 py-2">
                    <img class="h-10 w-10 rounded-full object-cover" src="https://ui-avatars.com/api/?name={{ Auth::user()->firstname }}&color=ffffff&background=323232" title="{{ Auth::user()->name }}" alt="{{ Auth::user()->name }}" />
                    <div class="flex flex-col justify-evenly items-stretch">
                        <span class="ml-3 text-sm font-medium uppercase">Hola,</span>
                        <span class="ml-3 text-base font-bold text-theme-gray">{{ ucwords(Auth::user()->firstname .' '. Auth::user()->lastname) }}</span>
                    </div>
                </div>
            </div>
            <div class="row mt-4 space-y-4 md:space-y-0 justify-between">
                <div class="w-full h-fit md:w-[25%] bg-white rounded-lg overflow-hidden shadow-lg">
                    <div>
                        <div class="row justify-between px-5 py-3 items-center cursor-pointer border-l-4 border-b-[1px] border-b-gray-300 hover:bg-gray-100" :class="tabProfile=='personal_information' ? 'border-l-theme-yellow bg-gray-100' : 'border-transparent'">
                            <button type="button" @click="tabProfile='personal_information'" class="flex items-center w-full">
                                <svg class="w-4 h-auto fill-theme-gray mr-[10px]" viewBox="0 0 377 518" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M376.139 497.246C376.139 508.381 367.097 517.418 355.967 517.418C344.831 517.418 335.789 508.381 335.789 497.246V407.5C335.789 391.547 329.253 377.031 318.763 366.547C308.268 356.052 293.752 349.516 277.809 349.516H98.3293C82.3867 349.516 67.8653 356.053 57.376 366.547C46.8864 377.037 40.3493 391.552 40.3493 407.5V497.246C40.3493 508.381 31.3077 517.418 20.172 517.418C9.04173 517.418 0 508.381 0 497.246V407.5C0 380.443 11.0625 355.839 28.8693 338.036C46.672 320.234 71.276 309.167 98.3334 309.167H277.813C304.871 309.167 329.475 320.229 347.277 338.036C365.08 355.839 376.147 380.443 376.147 407.5V497.246H376.139Z" fill="black"/>
                                    <path d="M278.912 37.6453C304 62.7333 316.552 95.6147 316.552 128.484C316.552 161.353 304 194.233 278.912 219.328C253.819 244.416 220.939 256.968 188.068 256.968C155.213 256.968 122.319 244.416 97.224 219.328C72.136 194.235 59.584 161.359 59.584 128.484C59.584 95.62 72.1361 62.7347 97.224 37.6453C122.317 12.552 155.213 0 188.068 0C220.932 0 253.817 12.5521 278.912 37.6453ZM276.209 128.484C276.209 105.921 267.594 83.3533 250.397 66.156C233.204 48.9587 210.637 40.344 188.069 40.344C165.517 40.344 142.933 48.9585 125.741 66.156C108.544 83.3533 99.9289 105.916 99.9289 128.484C99.9289 151.047 108.543 173.62 125.741 190.817C142.934 208.011 165.517 216.62 188.069 216.62C210.632 216.62 233.205 208.006 250.397 190.817C267.594 173.62 276.209 151.052 276.209 128.484Z" fill="black"/>
                                </svg> 
                                <div class="row justify-between items-center w-full">
                                    <span class="text-sm font-semibold text-theme-gray">{{ __('Datos personales') }}</span>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" :class="tabProfile=='personal_information' ? 'text-theme-yellow' : 'text-gray-300'">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                        </svg>  
                                    </div>
                                </div>
                            </button>
                        </div>
                        <div class="row justify-between px-5 py-3 items-center cursor-pointer border-l-4 border-b-[1px] border-b-gray-300 hover:bg-gray-100" :class="tabProfile=='update_password' ? 'border-l-theme-yellow bg-gray-100' : 'border-transparent'">
                            <button type="button" @click="tabProfile='update_password'" class="flex items-center w-full">
                                <svg class="w-4 h-auto fill-theme-gray  mr-[10px]" viewBox="0 0 402 517" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M379.121 209.124H346.342V136.512C346.342 87.7414 318.637 42.6752 273.671 18.2889C228.701 -6.0963 173.299 -6.0963 128.331 18.2889C83.3653 42.6741 55.6602 87.7403 55.6602 136.512V209.124H22.8814C16.8158 209.124 10.9914 211.389 6.70409 215.421C2.41159 219.453 0 224.919 0 230.62V495.509C0 501.21 2.41159 506.676 6.70409 510.707C10.9923 514.735 16.8162 517 22.8814 517H379.119C385.184 517 391.009 514.735 395.296 510.707C399.588 506.675 402 501.209 402 495.509V230.62C402 224.918 399.588 219.452 395.296 215.421C391.008 211.389 385.184 209.124 379.119 209.124H379.121ZM86.5858 136.512C86.5858 98.1187 108.393 62.6435 143.795 43.4449C179.197 24.2462 222.812 24.2462 258.212 43.4449C293.613 62.6435 315.421 98.1187 315.421 136.512V209.124H86.588L86.5858 136.512ZM371.081 487.954H30.9237V238.169H371.081V487.954Z" fill="black"/>
                                    <path d="M324.696 290.45H77.3093C68.7717 290.45 61.8477 296.95 61.8477 304.973V421.152C61.8477 425.001 63.4784 428.697 66.3775 431.42C69.2765 434.143 73.2067 435.674 77.3093 435.674H324.696C328.799 435.674 332.729 434.143 335.628 431.42C338.527 428.697 340.158 425.001 340.158 421.152V304.973C340.158 301.119 338.527 297.428 335.628 294.705C332.729 291.978 328.799 290.45 324.696 290.45ZM309.235 406.63H92.771V319.495H309.235V406.63Z" fill="black"/>
                                    <path d="M140.459 363.061C140.459 371.08 133.534 377.584 124.997 377.584C116.459 377.584 109.535 371.08 109.535 363.061C109.535 355.038 116.459 348.539 124.997 348.539C133.534 348.539 140.459 355.038 140.459 363.061Z" fill="black"/>
                                    <path d="M191.107 363.061C191.107 371.08 184.187 377.584 175.645 377.584C167.108 377.584 160.184 371.08 160.184 363.061C160.184 355.038 167.108 348.539 175.645 348.539C184.187 348.539 191.107 355.038 191.107 363.061Z" fill="black"/>
                                    <path d="M241.821 363.061C241.821 371.08 234.897 377.584 226.359 377.584C217.817 377.584 210.897 371.08 210.897 363.061C210.897 355.038 217.817 348.539 226.359 348.539C234.897 348.539 241.821 355.038 241.821 363.061Z" fill="black"/>
                                    <path d="M292.468 363.061C292.468 371.08 285.544 377.584 277.007 377.584C268.469 377.584 261.545 371.08 261.545 363.061C261.545 355.038 268.469 348.539 277.007 348.539C285.544 348.539 292.468 355.038 292.468 363.061Z" fill="black"/>
                                </svg>  
                                <div class="row justify-between items-center w-full">
                                    <span class="text-sm font-semibold text-theme-gray">{{ __('Cambiar contraseña') }}</span>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" :class="tabProfile=='update_password' ? 'text-theme-yellow' : 'text-gray-300'">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                        </svg>  
                                    </div>
                                </div>
                            </button>
                        </div>
                        <div class="row justify-between px-5 py-3 items-center cursor-pointer border-l-4 border-b-[1px] border-b-gray-300 hover:bg-gray-100" :class="tabProfile=='my_orders' ? 'border-l-theme-yellow bg-gray-100' : 'border-transparent'">
                            <button type="button" @click="tabProfile='my_orders'" class="flex items-center w-full">
                                <svg class="w-5 h-auto fill-theme-gray  mr-[10px]" viewBox="0 0 535 517" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M535 0H125.892V247.743H121.935C118.034 247.743 116.056 247.743 112.127 249.879H110.149C86.5474 254.182 72.7823 262.818 64.8966 269.288V239.106H0V275.727H31.487V478.243H0V517H64.9245V482.515H66.875L177.024 517H387.485C403.228 514.864 432.709 501.924 432.709 467.47C432.709 458.833 432.709 452.364 430.759 448.061H533.022L535 0ZM289.151 36.6212H373.72V129.242L330.446 107.697L289.123 129.242V36.6212H289.151ZM397.321 452.364C399.272 454.53 401.25 458.833 401.25 465.303C401.25 476.076 389.463 478.243 385.506 480.379H184.882L74.7328 445.894H64.9245V308.045H76.7391L82.6463 301.576C82.6463 301.576 98.362 282.197 141.636 282.197C186.888 282.197 200.653 299.439 200.653 299.439L206.56 308.045H289.151C289.151 308.045 295.058 308.045 298.987 312.348C300.965 314.485 302.944 318.818 302.944 325.288C302.862 329.286 301.456 333.114 298.987 336.061C295.086 340.333 289.179 340.333 287.2 340.333H173.123L175.073 359.742C177.024 389.894 192.795 448.061 243.899 448.061H387.513C389.463 448.061 395.371 448.061 397.349 452.394L397.321 452.364ZM501.562 411.47H387.485H243.899C224.226 411.47 216.368 392.061 212.412 376.985H285.194C291.101 376.985 308.795 376.985 322.56 364.045C328.468 357.606 336.353 346.833 338.304 325.288C338.304 303.742 330.446 292.97 324.539 284.364C310.774 269.258 291.101 269.257 289.151 269.257H220.297C212.412 260.651 198.647 252.046 173.095 247.743H169.166C167.187 247.743 163.259 247.743 161.28 245.606V36.6212H255.713V183.106L330.446 146.485L405.151 183.106V36.6212H499.556L501.562 411.47Z" fill="black"/>
                                </svg>
                                <div class="row justify-between items-center w-full">
                                    <span class="text-sm font-semibold text-theme-gray">{{ __('Mis compras') }}</span>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" :class="tabProfile=='my_orders' ? 'text-theme-yellow' : 'text-gray-300'">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                        </svg>  
                                    </div>
                                </div>
                            </button>
                        </div>
                        <div class="row justify-between px-5 py-3 items-center cursor-pointer border-l-4  border-transparent hover:bg-gray-100">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center w-full">
                                    <svg class="w-5 h-auto fill-[#bbb]  mr-[10px]" viewBox="0 0 514 514" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M256.853 513.707C115.28 513.707 0 398.42 0 256.853C0 115.287 115.287 0 256.853 0C398.42 0 513.707 115.287 513.707 256.853C513.707 398.42 398.42 513.707 256.853 513.707ZM256.853 35.84C134.999 35.84 35.84 134.996 35.84 256.853C35.84 378.708 134.996 477.867 256.853 477.867C378.708 477.867 477.867 378.711 477.867 256.853C477.867 134.999 378.705 35.84 256.853 35.84ZM256.853 395.44C180.395 395.44 118.267 333.315 118.267 256.853C118.267 216.832 135.589 178.603 166.053 152.323C173.819 145.75 184.569 146.349 191.141 154.114C197.714 161.88 197.115 172.63 189.35 179.202C146.339 216.238 141.563 281.348 179.193 324.349C216.229 367.36 281.339 372.136 324.34 334.505C367.351 296.875 372.127 232.36 334.496 189.359C331.512 185.775 327.923 182.192 324.34 179.202C316.574 172.629 315.975 161.281 322.548 154.114C329.121 146.948 340.47 145.75 347.636 152.323C405.579 202.5 411.554 290.309 361.376 347.656C335.095 378.12 296.866 395.443 256.846 395.443L256.853 395.44ZM256.853 232.96C246.697 232.96 238.932 225.194 238.932 215.039V107.517C238.932 97.3611 246.698 89.596 256.853 89.596C267.009 89.596 274.775 97.3616 274.775 107.517V215.039C274.775 224.601 267.009 232.96 256.853 232.96Z" fill="#bbb"/>
                                    </svg> 
                                    <div class="row justify-between items-center w-full">
                                        <span class="text-sm font-semibold text-[#bbb]">{{ __('Cerrar sesión') }}</span>
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>
                    
                </div>  
                <div class="w-full md:w-[74%] bg-white rounded-lg shadow-lg" :class="tabProfile=='personal_information' ? '' : 'hidden'">
                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                        @livewire('profile.update-profile-information-form')
                    @endif
                </div>
                <div class="w-full md:w-[74%] bg-white rounded-lg shadow-lg" :class="tabProfile=='update_password' ? '' : 'hidden'">
                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        @livewire('profile.update-password-form')
                    @endif
                </div>
                <div class="w-full md:w-[74%] bg-white rounded-lg shadow-lg" :class="tabProfile=='my_orders' ? '' : 'hidden'">
                    @if(Auth::user()->orders->count())
                    <div class="px-8 py-6">
                        <h1 class="text-lg font-semibold text-theme-gray">Mis compras</h1>
                        <div class="mt-4 flex flex-col">
                            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                              <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="overflow-hidden ring-1 ring-black ring-opacity-5">
                                  <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-theme-gray">
                                      <tr>
                                        <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-white">Nro Orden</th>
                                        <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-white">Fecha</th>
                                        <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-white">Email</th>
                                        <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-white">Medio Contacto</th>
                                        <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-white">Información Contacto</th>
                                        <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-white">Estado</th>
                                      </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach (Auth::user()->orders as $order)
                                        <tr>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-center font-medium text-gray-900">
                                                <a href="{{ route('order.show',$order->nro_order) }}" class="hover:underline hover:text-theme-yellow">{{ $order->nro_order }}</a>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-theme-gray">{{ $order->created_at }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-theme-gray">{{ $order->email }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-theme-gray capitalize">{{ $order->contact_medium }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-theme-gray">{{ $order->contact_information }}</td>
                                            @switch($order->status)
                                                @case(1)
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-theme-gray">Pendiente</td>
                                                    @break
                                                @case(2)
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-theme-gray">Recibido</td>
                                                    @break
                                                @case(3)
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-theme-gray">En proceso</td>
                                                    @break
                                                @default
                                                    
                                            @endswitch
                                        </tr>
                                        @endforeach
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    @else
                    <div>
                        no hay pedidos
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
