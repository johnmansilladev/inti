<section x-data class="bg-gray-100">
    <div class="max-w-[80%] mx-auto py-4">
        <div class="relative flex items-center justify-between rounded-lg">
            <div class="w-1/2">
              <div class="mt-1 relative rounded-md shadow-sm">
                <input type="search" wire:model="searchProduct" class="w-full pl-12 py-3 border-transparent text-theme-black placeholder-gray-300 focus:outline-none focus:ring-transparent focus:border-transparent sm:text-sm rounded-md" placeholder="Buscar">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <svg class="h-5 w-5" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.0396 0.105286C7.32757 0.166338 7.62313 0.219759 7.90352 0.280812C10.6923 0.937127 12.6777 3.5166 12.6398 6.39371C12.6171 7.80555 12.2079 9.07239 11.3364 10.179C11.2607 10.2782 11.2455 10.3392 11.344 10.4232C11.4198 10.4842 11.4804 10.5682 11.5562 10.6445C11.7835 10.8811 11.9578 11.1024 12.3822 10.9879C12.89 10.8429 13.3674 11.0719 13.7463 11.4611C14.9057 12.6363 16.0652 13.8192 17.2322 14.9945C17.4671 15.2311 17.5808 15.5363 17.6793 15.8416V16.4063C17.5581 16.704 17.4292 16.994 17.1867 17.2305C16.5805 17.8105 15.6256 17.8182 15.027 17.2305C13.8448 16.0553 12.6702 14.88 11.4955 13.7048C11.0409 13.2469 10.8969 12.6974 11.0863 12.0792C11.1242 11.9571 11.1015 11.8961 11.0181 11.8198C10.8514 11.6595 10.6771 11.4992 10.5256 11.3237C10.4195 11.2016 10.3437 11.2169 10.2224 11.3084C7.79742 13.1705 4.5161 13.0713 2.27298 11.0032C0.431495 9.30134 -0.197508 7.14923 0.454211 4.73002C1.10593 2.31844 2.72766 0.837917 5.15266 0.250285C5.35727 0.204496 5.57703 0.21976 5.76648 0.120549H7.02448L7.0396 0.105286ZM11.4652 6.36318C11.4652 3.57002 9.20696 1.28818 6.44095 1.28818C3.71282 1.28818 1.41665 3.57765 1.41665 6.2945C1.41665 9.13344 3.65977 11.4229 6.43336 11.4305C9.21453 11.4305 11.4652 9.1716 11.4652 6.36318ZM12.5717 12.1403C12.4353 12.1555 12.3064 12.2242 12.2382 12.3845C12.1549 12.5677 12.2079 12.7203 12.3443 12.85C13.4962 14.0177 14.648 15.1853 15.7999 16.3453C15.9894 16.5361 16.2243 16.5437 16.3986 16.3758C16.5729 16.2003 16.5653 15.979 16.3683 15.7806C15.224 14.6206 14.0797 13.4605 12.9354 12.2929C12.8445 12.2013 12.7384 12.1403 12.5792 12.1403H12.5717Z" fill="black"/>
                  </svg>
                </div>
              </div>
            </div>
            <div class="bg-white py-2 px-6 rounded-lg w-72">
              <label id="listbox-label" class="block text-xs font-semibold text-gray-700"> Ordenar por: </label>
              <div x-data="{ open: false }" class="mt-1 relative">
                <button @click="open = !open" type="button" class="relative w-full pr-10 text-left cursor-default focus:outline-none focus:ring-transparent focus:ring-transparent focus:border-transparent text-sm hover:cursor-pointer" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                  <span class="block truncate"> Recomendados </span>
                  <span class="absolute inset-y-0 right-0 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>   
                  </span>
                </button>
                <ul x-show="open" class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-68 rounded-md py-1 ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none text-sm" tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-1"  @click.outside="open = false" style="display: none">
                    <li  class="text-theme-gray cursor-default select-none relative py-2 px-6 border-l-4 border-l-transparent hover:border-l-4 hover:border-l-theme-orange hover:bg-theme-lwgray hover:cursor-pointer" id="listbox-option-0" role="option">
                      <span class="font-normal block truncate"> Recomendados </span>
                    </li>
                    <li class="text-theme-gray cursor-default select-none relative py-2 px-6 border-l-4 border-l-transparent hover:border-l-4 hover:border-l-theme-orange hover:bg-theme-lwgray hover:cursor-pointer" id="listbox-option-1" role="option">
                        <span class="font-normal block truncate"> Nombre A - Z </span>
                    </li>
                    <li class="text-theme-gray cursor-default select-none relative py-2 px-6 border-l-4 border-l-transparent hover:border-l-4 hover:border-l-theme-orange hover:bg-theme-lwgray hover:cursor-pointer" id="listbox-option-2" role="option">
                        <span class="font-normal block truncate"> Nombre Z - A </span>
                    </li>
                    <li class="text-theme-gray cursor-default select-none relative py-2 px-6 border-l-4 border-l-transparent hover:border-l-4 hover:border-l-theme-orange hover:bg-theme-lwgray hover:cursor-pointer" id="listbox-option-5" role="option">
                        <span class="font-normal block truncate"> Precio de menor a mayor</span>
                    </li>
                    <li class="text-theme-gray cursor-default select-none relative py-2 px-6 border-l-4 border-l-transparent hover:border-l-4 hover:border-l-theme-orange hover:bg-theme-lwgray hover:cursor-pointer" id="listbox-option-6" role="option">
                        <span class="font-normal block truncate"> Precio de mayor a menor</span>
                    </li>
                </ul>
              </div>
            </div>              
          </div>
          <div aria-labelledby="products-heading" class="pt-4 pb-24">
            <h2 id="products-heading" class="sr-only">Products</h2>

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-x-8 gap-y-10">
                <!-- Filters -->
                <div class="bg-white rounded-lg shadow-xl col-span-1 hidden lg:block py-4 px-4">
                    <h3 class="text-lg text-theme-black font-semibold uppercase border-b border-gray-200 pb-2">Filtros</h3>
                    <div x-data="{ open: true }" class="border-b border-gray-200 py-4">
                        <h3 class="-my-3 flow-root">
                        <button type="button" class="py-3 w-full flex items-center justify-between text-sm text-theme-black" aria-controls="filter-section-brand" @click="open = !open" aria-expanded="true" x-bind:aria-expanded="open.toString()">
                            <span class="text-theme-black font-bold">Marcas</span>
                            <span class="ml-6 flex items-center">
                            <svg class="h-5 w-5" x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                            </svg>
                            <svg class="h-5 w-5" x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            </span>
                        </button>
                        </h3>
                        <div class="mt-4 max-h-[300px] overflow-auto scrollbar scrollbar-thumb-theme-orange scrollbar-track-gray-100 scrollbar-theme" id="filter-section-brand" x-show="open">
                            <div class="space-y-4">
                                @foreach ($brands as $key => $brand)
                                    <div class="flex items-center m-2">
                                        <input id="filter-brand-{{ $key }}" type="checkbox" wire:model="brandsFilter" value="{{ $brand->id }}" class="h-4 w-4 border-gray-300 rounded text-theme-yellow focus:ring-theme-yellow">
                                        <label for="filter-brand-{{ $key }}" class="ml-3 text-sm text-theme-black truncate">
                                            {{ Str::title($brand->name) }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div x-data="{ open: true }" class="border-b border-gray-200 py-4">
                        <h3 class="-my-3 flow-root">
                        <button type="button" class="py-3 w-full flex items-center justify-between text-sm text-theme-black" aria-controls="filter-section-interfase" @click="open = !open" aria-expanded="true" x-bind:aria-expanded="open.toString()">
                            <span class="text-theme-black font-bold">Interfaces</span>
                            <span class="ml-6 flex items-center">
                            <svg class="h-5 w-5" x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                            </svg>
                            <svg class="h-5 w-5" x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            </span>
                        </button>
                        </h3>
                        <div class="mt-4 max-h-[300px] overflow-auto scrollbar scrollbar-thumb-theme-orange scrollbar-track-gray-100 scrollbar-theme" id="filter-section-interfase" x-show="open">
                            <div class="space-y-4">
                                @foreach ($interfases as $key => $interfase)
                                    <div class="flex items-center m-2">
                                        <input id="filter-interfase-{{ $key }}" type="checkbox" wire:model="interfacesFilter" value="{{ $interfase->id }}" class="h-4 w-4 border-gray-300 rounded text-theme-yellow focus:ring-theme-yellow">
                                        <label for="filter-interfase-{{ $key }}" class="ml-3 text-sm text-theme-black truncate">
                                            {{ Str::title($interfase->name) }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product grid -->
                <div class="col-span-3 flex flex-col">
                    <div class="grid grid-cols-4 gap-x-6 gap-y-8">
                        @foreach ($products as $item)
                            <x-box-product-text :item="$item"/>
                        @endforeach
                    </div>
                    <div class="mt-44">
                        {{$products->links()}}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
