<x-app-layout>

    @section('title')  {{ Str::title(__($shop_section)) . (!empty($data_section) ? ' '.  Str::title(__($data_section->name)) : '') }} @endsection
    
    @if ($data_section)

    <section>
        <div class="bg-gray-100 md:bg-white md:relative">
            <div class="max-md:hidden">
                <picture>
                    <img src="{{ Storage::url($data_section->image) }}" alt="" class="w-full h-full object-center object-cover">
                </picture>
            </div>
            <div class="md:absolute md:inset-0 py-2 md:py-8">
                <div class="max-w-[90%] md:max-w-[80%] mx-auto w-full h-full">
                    <nav aria-label="Breadcrumb">
                        <ol role="list" class="row items-center space-x-2 md:space-x-4">
                            <li>
                                <div class="flex items-center">
                                    <a href="/" class="mr-1 md:mr-4 text-[11px] md:text-sm font-bold text-theme-gray uppercase">Home</a>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="h-5 w-auto text-theme-gray">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                    </svg>
                                </div>
                            </li>

                            <li>
                                <div class="flex items-center">
                                    <a href="" class="mr-1 md:mr-4 text-[11px] md:text-sm font-bold text-theme-gray uppercase">{{__($shop_section) }}</a>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="h-5 w-auto text-theme-gray">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                    </svg>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <a href="" aria-current="page" class="text-[11px] md:text-sm font-bold text-theme-yellow uppercase pointer-events-none">{{__($data_section->name) }}</a>
                                </div>
                            </li>
                        </ol>
                    </nav>
                    {{-- <div class="flex justify-center items-center h-full">
                        <h1 class=" text-4xl font-extrabold text-white text-center uppercase">{{ $data_section->name }}</h1>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    @endif

    @livewire('frontend.shops.shop-filter', ['shop_section' => $shop_section,'shop_section_url' => $shop_section_url])


</x-app-layout>