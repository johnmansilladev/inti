<x-app-layout>
    <section>
        <div class="relative">
            <picture>
                <img src="{{ Storage::url($category->image) }}" alt="" class="w-full h-full object-center object-cover">
            </picture>
            <div class="absolute inset-0 bg-theme-bblack py-10">
                <div class="max-w-[80%] mx-auto w-full h-full">
                    <nav aria-label="Breadcrumb">
                        <ol role="list" class="flex items-center space-x-4">
                            <li>
                                <div class="flex items-center">
                                    <a href="/" class="mr-4 text-sm font-medium text-white">Home</a>
                                    <svg viewBox="0 0 6 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-5 w-auto text-gray-300">
                                        <path d="M4.878 4.34H3.551L.27 16.532h1.327l3.281-12.19z" fill="currentColor" />
                                    </svg>
                                </div>
                            </li>

                            <li>
                                <div class="flex items-center">
                                    <a href="" class="mr-4 text-sm font-medium text-white">Categorias</a>
                                    <svg viewBox="0 0 6 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-5 w-auto text-gray-300">
                                        <path d="M4.878 4.34H3.551L.27 16.532h1.327l3.281-12.19z" fill="currentColor" />
                                    </svg>
                                </div>
                            </li>
                    
                            <li class="text-sm">
                                <a href="{{ route('category.index',$category) }}" aria-current="page" class="font-medium text-white pointer-events-none">{{ $category->name }}</a>
                            </li>
                        </ol>
                    </nav>
                    <div class="flex justify-center items-center h-full">
                        <h1 class=" text-4xl font-extrabold text-white text-center uppercase">{{ $category->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @livewire('category-filter', ['category' => $category])

</x-app-layout>