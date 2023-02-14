<x-app-layout>
    @section('title') {{ 'Mi perfil' }} @endsection
    <section class="bg-theme-lwgray">
        <div class="max-w-[90%] lg:max-w-[60%] mx-auto py-6">
            <div class="row justify-start items-stretch bg-white rounded shadow-lg p-1">
                <div class="row justify-start items-stretch px-4 py-2">
                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" title="{{ Auth::user()->name }}" alt="{{ Auth::user()->name }}" />
                    <div class="flex flex-col justify-evenly items-stretch">
                        <span class="ml-3 text-sm font-medium uppercase">Hola,</span>
                        <span class="ml-3 text-base font-bold ">{{ ucwords(Auth::user()->firstname .' '. Auth::user()->lastname) }}</span>
                    </div>
                </div>
            </div>
            <div class="flex mt-4">
                <div class="w-full lg:max-w-[320px] bg-white rounded shadow-lg mr-[20px]">
                    <div>
                        <div class="row items-center p-[20px] border-l-4 border-transparent">
                            <svg viewBox="0 0 32 32" fill="#495867" xmlns="http://www.w3.org/2000/svg" class="w-12 h-auto fill-theme-gray">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16 8c-2.4 0-4.4 2-4.4 4.4 0 2.4 2 4.4 4.4 4.4 2.4 0 4.4-2 4.4-4.4 0-2.4-2-4.4-4.4-4.4zm2.93 9.467h-5.855l-.217.006-.236.02c-1.692.204-3.045 1.515-3.259 3.122l-.022.221-.007.222L9.332 24h1.2l.002-2.944.008-.194.025-.21a2.529 2.529 0 012.1-2.087l.204-.024.206-.008h5.867l.187.009.207.027c1.062.19 1.926 1.115 2.098 2.23l.024.211.007.2-.002 2.79h1.202v-2.925l-.006-.217-.02-.224c-.2-1.673-1.515-2.94-3.227-3.14l-.236-.02-.248-.007zm.403-5.067A3.3 3.3 0 0016 9.067a3.301 3.301 0 00-3.333 3.333A3.3 3.3 0 0016 15.733a3.3 3.3 0 003.333-3.333z" fill="inherit"></path>
                            </svg>
                            <div>
                                <span>Datos personales</span>
    
                            </div>
                        </div>
                    </div>
                    
                </div>  
                <div class="w-full bg-white rounded shadow-lg">

                </div>
            </div>
        </div>
    </section>
</x-app-layout>
