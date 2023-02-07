<section x-data class="bg-gray-100">
    <div class="container md:py-4">
        <div class="relative hidden md:flex items-center justify-between rounded-lg">
            <div class="w-1/2">
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input type="search" wire:model="search"
                        class="w-full pl-12 py-3 border-transparent text-theme-black placeholder-gray-300 focus:outline-none focus:ring-transparent focus:border-transparent sm:text-sm rounded-md"
                        placeholder="Buscar">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.0396 0.105286C7.32757 0.166338 7.62313 0.219759 7.90352 0.280812C10.6923 0.937127 12.6777 3.5166 12.6398 6.39371C12.6171 7.80555 12.2079 9.07239 11.3364 10.179C11.2607 10.2782 11.2455 10.3392 11.344 10.4232C11.4198 10.4842 11.4804 10.5682 11.5562 10.6445C11.7835 10.8811 11.9578 11.1024 12.3822 10.9879C12.89 10.8429 13.3674 11.0719 13.7463 11.4611C14.9057 12.6363 16.0652 13.8192 17.2322 14.9945C17.4671 15.2311 17.5808 15.5363 17.6793 15.8416V16.4063C17.5581 16.704 17.4292 16.994 17.1867 17.2305C16.5805 17.8105 15.6256 17.8182 15.027 17.2305C13.8448 16.0553 12.6702 14.88 11.4955 13.7048C11.0409 13.2469 10.8969 12.6974 11.0863 12.0792C11.1242 11.9571 11.1015 11.8961 11.0181 11.8198C10.8514 11.6595 10.6771 11.4992 10.5256 11.3237C10.4195 11.2016 10.3437 11.2169 10.2224 11.3084C7.79742 13.1705 4.5161 13.0713 2.27298 11.0032C0.431495 9.30134 -0.197508 7.14923 0.454211 4.73002C1.10593 2.31844 2.72766 0.837917 5.15266 0.250285C5.35727 0.204496 5.57703 0.21976 5.76648 0.120549H7.02448L7.0396 0.105286ZM11.4652 6.36318C11.4652 3.57002 9.20696 1.28818 6.44095 1.28818C3.71282 1.28818 1.41665 3.57765 1.41665 6.2945C1.41665 9.13344 3.65977 11.4229 6.43336 11.4305C9.21453 11.4305 11.4652 9.1716 11.4652 6.36318ZM12.5717 12.1403C12.4353 12.1555 12.3064 12.2242 12.2382 12.3845C12.1549 12.5677 12.2079 12.7203 12.3443 12.85C13.4962 14.0177 14.648 15.1853 15.7999 16.3453C15.9894 16.5361 16.2243 16.5437 16.3986 16.3758C16.5729 16.2003 16.5653 15.979 16.3683 15.7806C15.224 14.6206 14.0797 13.4605 12.9354 12.2929C12.8445 12.2013 12.7384 12.1403 12.5792 12.1403H12.5717Z"
                                fill="black" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white py-2 px-6 rounded-lg w-72">
                <label id="listbox-label" class="block text-xs font-semibold text-gray-700"> Ordenar por: </label>
                <div x-data="{ open: false }" class="mt-1 relative">
                    <button @click="open = !open" type="button"
                        class="relative w-full pr-10 text-left cursor-default focus:outline-none focus:ring-transparent focus:ring-transparent focus:border-transparent text-sm hover:cursor-pointer"
                        aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                        @if ($sortFilter == 'OrderByRecommended')
                            <span class="block truncate">Recomendados </span>
                        @elseif($sortFilter == 'OrderByNameASC')
                            <span class="block truncate">Nombre A - Z </span>
                        @elseif($sortFilter == 'OrderByNameDESC')
                            <span class="block truncate">Nombre Z - A </span>
                        @elseif($sortFilter == 'OrderByPriceASC')
                            <span class="block truncate">Precio de menor a mayor </span>
                        @elseif($sortFilter == 'OrderByPriceDESC')
                            <span class="block truncate">Precio de mayor a menor </span>
                        @endif
                        <span class="absolute inset-y-0 right-0 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open"
                        class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-68 rounded-md py-1 ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none text-sm"
                        tabindex="-1" role="listbox" aria-labelledby="listbox-label"
                        aria-activedescendant="listbox-option-1" @click.outside="open = false" style="display: none">
                        <li wire:click="$set('sortFilter', 'OrderByRecommended')"
                            class="text-theme-gray cursor-default select-none relative py-2 px-6 border-l-4 border-l-transparent hover:border-l-4 hover:border-l-theme-orange hover:bg-theme-lwgray hover:cursor-pointer {{ $sortFilter == 'OrderByRecommended' ? 'border-l-theme-orange bg-theme-lwgray' : '' }}"
                            @click="open = false" id="listbox-option-0" role="option">
                            <span class="font-normal block truncate"> Recomendados </span>
                        </li>
                        <li wire:click="$set('sortFilter', 'OrderByNameASC')"
                            class="text-theme-gray cursor-default select-none relative py-2 px-6 border-l-4 border-l-transparent hover:border-l-4 hover:border-l-theme-orange hover:bg-theme-lwgray hover:cursor-pointer {{ $sortFilter == 'OrderByNameASC' ? 'border-l-theme-orange bg-theme-lwgray' : '' }}"
                            @click="open = false" id="listbox-option-1" role="option">
                            <span class="font-normal block truncate"> Nombre A - Z </span>
                        </li>
                        <li wire:click="$set('sortFilter', 'OrderByNameDESC')"
                            class="text-theme-gray cursor-default select-none relative py-2 px-6 border-l-4 border-l-transparent hover:border-l-4 hover:border-l-theme-orange hover:bg-theme-lwgray hover:cursor-pointer {{ $sortFilter == 'OrderByNameDESC' ? 'border-l-theme-orange bg-theme-lwgray' : '' }}"
                            @click="open = false" id="listbox-option-2" role="option">
                            <span class="font-normal block truncate"> Nombre Z - A </span>
                        </li>
                        <li wire:click="$set('sortFilter', 'OrderByPriceASC')"
                            class="text-theme-gray cursor-default select-none relative py-2 px-6 border-l-4 border-l-transparent hover:border-l-4 hover:border-l-theme-orange hover:bg-theme-lwgray hover:cursor-pointer {{ $sortFilter == 'OrderByPriceASC' ? 'border-l-theme-orange bg-theme-lwgray' : '' }}"
                            @click="open = false" id="listbox-option-5" role="option">
                            <span class="font-normal block truncate"> Precio de menor a mayor</span>
                        </li>
                        <li wire:click="$set('sortFilter', 'OrderByPriceDESC')"
                            class="text-theme-gray cursor-default select-none relative py-2 px-6 border-l-4 border-l-transparent hover:border-l-4 hover:border-l-theme-orange hover:bg-theme-lwgray hover:cursor-pointer {{ $sortFilter == 'OrderByPriceDESC' ? 'border-l-theme-orange bg-theme-lwgray' : '' }}"
                            @click="open = false" id="listbox-option-6" role="option">
                            <span class="font-normal block truncate"> Precio de mayor a menor</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div aria-labelledby="products-heading" class="py-2 md:pt-4 md:pb-24">
            <h2 id="products-heading" class="sr-only">Products</h2>

            <div x-data="{ open: false, option: 'filters' }" x-init="$watch('open', toggleOverflow)" @keydown.window.escape="open = false">

                <div x-show="open" class="relative z-40 lg:hidden" x-ref="dialog" aria-modal="true" style="display: none;">
          
                    <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-description="Off-canvas menu backdrop, show/hide based on off-canvas menu state." class="fixed inset-0 bg-black bg-opacity-25" style="display: none;"></div>
                  
        
                  <div class="fixed inset-0 z-40 flex">
                    
                      <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="translate-x-full" 
                        x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" 
                        x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" 
                        class="relative ml-auto flex h-full w-full max-w-xs flex-col overflow-y-auto bg-white" 
                        @click.away="open = false" style="display: none;">

                        <div class="flex h-full flex-col bg-white shadow-xl">
                            <div class="border-b-2 border-theme-yellow py-2 px-0">
                                <div class="flex items-center justify-between px-5">
                                    <p class="text-base font-semibold"><span class="text-theme-yellow">{{ $products->total()}}</span> {{ $products->total()>1 ? __('resultados') : __('resultado')}}</p>
                                    @if ($totalfiltersApplied > 0)
                                    <p class="text-sm text-theme-yellow"><span>{{ $totalfiltersApplied }}</span> {{ __('Borrar filtros') }} </p>   
                                    @endif
                                   
                                    {{-- <h2 class="flex items-center text-lg font-medium text-gray-900">
                                        <svg class="w-5 h-5 mr-2" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3.45245 3.64247C3.03926 3.64247 2.63705 3.64247 2.23426 3.64247C1.72282 3.64247 1.21081 3.64728 0.699372 3.64067C0.298893 3.63526 -0.0027676 3.31189 0.00301133 2.91039C0.00879026 2.51789 0.306405 2.20715 0.69995 2.20474C1.53558 2.19933 2.37179 2.20294 3.20801 2.20294C3.28602 2.20294 3.36461 2.20294 3.45245 2.20294C3.4825 1.82067 3.59173 1.48708 3.84195 1.2166C4.10894 0.927496 4.43603 0.771221 4.82206 0.76521C5.22543 0.758599 5.62938 0.763407 6.03275 0.763407C6.98974 0.763407 7.48557 1.20338 7.63235 2.20294H7.88431C10.976 2.20294 14.0672 2.20294 17.1589 2.20294C17.245 2.20294 17.3329 2.19813 17.4178 2.21256C17.7651 2.27086 18.0171 2.60385 17.9963 2.96688C17.9755 3.32091 17.6998 3.61182 17.3542 3.63947C17.2757 3.64548 17.1959 3.64187 17.1167 3.64187C14.0395 3.64187 10.9622 3.64187 7.88547 3.64187H7.63351C7.50984 4.46953 7.13305 4.97382 6.4627 5.04534C5.85071 5.11086 5.22138 5.11026 4.6094 5.04354C3.94251 4.97081 3.54029 4.43407 3.45303 3.64247H3.45245Z" fill="black"/>
                                            <path d="M8.98905 7.96297C9.09249 7.02292 9.63109 6.52404 10.5101 6.52344C10.8632 6.52344 11.2162 6.52344 11.5693 6.52344C12.5263 6.52344 13.021 6.96341 13.1689 7.96297C13.2435 7.96297 13.3215 7.96297 13.3989 7.96297C14.6888 7.96297 15.9787 7.95997 17.2691 7.96417C17.8302 7.96598 18.1741 8.54059 17.9088 9.02804C17.7644 9.29371 17.5349 9.40431 17.2431 9.40371C15.9677 9.4007 14.6923 9.4025 13.4163 9.4025H13.1713C13.1516 9.5125 13.1366 9.61408 13.1158 9.71325C12.98 10.3522 12.45 10.8222 11.8242 10.8378C11.3272 10.8505 10.8296 10.8511 10.3326 10.8378C9.60739 10.8186 9.08787 10.2638 8.98905 9.4019C8.90814 9.4019 8.82377 9.4019 8.7394 9.4019C6.07993 9.4019 3.42105 9.4025 0.761586 9.4013C0.2149 9.4013 -0.132992 8.92166 0.0484666 8.42579C0.155955 8.13127 0.405027 7.96297 0.745983 7.96237C1.95667 7.96117 3.16735 7.96237 4.37804 7.96237C5.83375 7.96237 7.28946 7.96237 8.74518 7.96237H8.98962L8.98905 7.96297Z" fill="black"/>
                                            <path d="M7.62431 15.1598C7.59599 15.5715 7.4677 15.9214 7.188 16.1966C6.92044 16.4605 6.59971 16.5963 6.23043 16.5982C5.79066 16.6006 5.35146 16.6006 4.91168 16.5982C4.11997 16.5951 3.56288 16.0788 3.46521 15.2608C3.46175 15.2325 3.45655 15.2049 3.44961 15.1586C3.2225 15.1586 3.00059 15.1586 2.7781 15.1586C2.10081 15.1586 1.42352 15.1604 0.745651 15.158C0.309919 15.1562 -0.0015649 14.8479 0.00248035 14.4301C0.0065256 14.0208 0.313387 13.7215 0.739294 13.7197C1.56106 13.7173 2.38224 13.7191 3.20401 13.7191C3.28202 13.7191 3.36062 13.7191 3.43574 13.7191C3.4733 13.5526 3.49527 13.3975 3.54323 13.2515C3.72989 12.6762 4.23439 12.2922 4.81864 12.2814C5.23646 12.2735 5.65427 12.2796 6.07267 12.2796C6.98805 12.2796 7.50295 12.749 7.62951 13.7191C7.71099 13.7191 7.79594 13.7191 7.88089 13.7191C10.9871 13.7191 14.0927 13.7179 17.1988 13.7233C17.3514 13.7233 17.5184 13.7557 17.6542 13.8255C17.9183 13.9619 18.0472 14.3009 17.9819 14.5912C17.9125 14.902 17.6617 15.1304 17.3572 15.1556C17.2786 15.1622 17.1988 15.1586 17.1197 15.1586C14.0424 15.1586 10.9651 15.1586 7.88841 15.1586H7.62489L7.62431 15.1598Z" fill="black"/>
                                        </svg> 
                                        {{ __('Filtros') }}
                                    </h2>
                                    <button type="button" class="-mr-2 flex items-center justify-center rounded-full bg-theme-lwgray p-2 text-gray-400" @click="open = false">
                                      <span class="sr-only">Close menu</span>
                                      <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                          <path class="stroke-black" stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                      </svg>
                                    </button> --}}
                                </div>
                            </div>
                            <div class="flex-1 overflow-y-auto scrollbar scrollbar-thumb-theme-yellow scrollbar-track-gray-100 scrollbar-theme px-5">
                                <!-- Filters -->
                                <div x-show="option=='filters'">
                                    @if ($totalfiltersApplied > 0)
                                    <div x-data="{ open: true }" class="border-b border-gray-200 py-4">
                                        <h3 class="-my-3 flow-root">
                                        <button type="button" class="py-3 w-full flex items-center justify-between text-sm text-theme-black" aria-controls="filter-section-applied-mobile" @click="open = !open" aria-expanded="true" x-bind:aria-expanded="open.toString()">
                                            <span class="text-theme-black font-bold uppercase">{{ __('Filtros aplicados') }}</span>
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
                                        <div class="mt-4" id="filter-section-applied-mobile" x-show="open">
                                            <div class="row">
                                                @foreach($filtersApplied as $filterType => $filterValues)
                                                    @if(count($filterValues))
                                                        @foreach($filterValues as $keyfilterApplied => $filterValue)
                                                            <div class="row">
                                                                <button type="button"  wire:loading.attr="disabled" wire:target="filtersApplied" wire:click="removeFilter('{{ $filterType }}',{{ $keyfilterApplied }})" 
                                                                    class="row items-center text-sm text-theme-gray bg-theme-lwgray border border-theme-lwgray hover:border-theme-yellow hover:cursor-pointer group rounded-xl px-2 py-1 ml-1 mb-1">
                                                                    <span>{{ Str::title(__($filterValue)) }}</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="group-hover:stroke-theme-yellow w-4 h-4">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                                    </svg>                                                          
                                                                </button>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div> 
                                    @endif

                                    @foreach ($filters as $keyFilter => $filter)
                                        @if (count($filter))
                                            <div x-data="{ open: true }" class="border-b border-gray-200 py-4">
                                                <h3 class="-my-3 flow-root">
                                                <button type="button" class="py-3 w-full flex items-center justify-between text-sm text-theme-black" aria-controls="filter-section-{{ $keyFilter }}" @click="open = !open" aria-expanded="true" x-bind:aria-expanded="open.toString()">
                                                    <span class="text-theme-black font-bold uppercase">{{ __($keyFilter) }}</span>
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
                                                <div class="mt-4" id="filter-section-{{ $keyFilter }}" x-show="open">
                                                    <div class="space-y-4">
                                                        @foreach ($filter as $keyItem => $item)
                                                            <div class="flex items-center m-2">
                                                                <input id="filter-{{ $keyFilter }}-{{ $keyItem }}" type="checkbox" wire:model="filtersApplied.{{ $keyFilter }}" value="{{ $item['name'] }}" class="h-4 w-6 border-gray-300 rounded text-theme-yellow focus:ring-theme-yellow hover:cursor-pointer" wire:target="filtersApplied" wire:loading.attr="disabled">
                                                                <label for="filter-{{ $keyFilter }}-{{ $keyItem }}" class="ml-3 text-sm text-theme-black truncate hover:cursor-pointer">
                                                                    {{ __(Str::title($item['name'])) }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>    
                                        @endif
                                    @endforeach
                                </div>

                                <!-- SortBy -->
                                <div x-show="option=='sortBy'">
                                    <div class="py-4">
                                        {{-- <h3 class="-my-3 flow-root">
                                        <button type="button" class="py-3 w-full flex items-center justify-between text-sm text-theme-black" aria-controls="filter-section-{{ $keyFilter }}" @click="open = !open" aria-expanded="true" x-bind:aria-expanded="open.toString()">
                                            <span class="text-theme-black font-bold uppercase">{{ __($keyFilter) }}</span>
                                            <span class="ml-6 flex items-center">
                                            <svg class="h-5 w-5" x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;">
                                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            <svg class="h-5 w-5" x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            </span>
                                        </button>
                                        </h3> --}}
                                        <div class="mt-4" id="filter-section-sortby-mobile">
                                            <div class="space-y-4">
                                                    <div class="flex items-center m-2">
                                                        <input id="sort-by-recommended" type="radio" wire:model="sortFilter" value="OrderByRecommended" class="h-4 w-6 border-gray-300 rounded text-theme-yellow focus:ring-theme-yellow hover:cursor-pointer" wire:target="sortFilter" wire:loading.attr="disabled">
                                                        <label for="sort-by-recommended" class="ml-3 text-sm text-theme-black truncate hover:cursor-pointer">Recomendados</label>
                                                    </div>
                                                    <div class="flex items-center m-2">
                                                        <input id="sort-by-name-asc" type="radio" wire:model="sortFilter" value="OrderByNameASC" class="h-4 w-6 border-gray-300 rounded text-theme-yellow focus:ring-theme-yellow hover:cursor-pointer" wire:target="sortFilter" wire:loading.attr="disabled">
                                                        <label for="sort-by-name-asc" class="ml-3 text-sm text-theme-black truncate hover:cursor-pointer">Nombre A - Z</label>
                                                    </div>
                                                    <div class="flex items-center m-2">
                                                        <input id="sort-by-name-desc" type="radio" wire:model="sortFilter" value="OrderByNameDESC" class="h-4 w-6 border-gray-300 rounded text-theme-yellow focus:ring-theme-yellow hover:cursor-pointer" wire:target="sortFilter" wire:loading.attr="disabled">
                                                        <label for="sort-by-name-desc" class="ml-3 text-sm text-theme-black truncate hover:cursor-pointer">Nombre Z - A</label>
                                                    </div>
                                                    <div class="flex items-center m-2">
                                                        <input id="sort-by-price-asc" type="radio" wire:model="sortFilter" value="OrderByPriceASC" class="h-4 w-6 border-gray-300 rounded text-theme-yellow focus:ring-theme-yellow hover:cursor-pointer" wire:target="sortFilter" wire:loading.attr="disabled">
                                                        <label for="sort-by-price-asc" class="ml-3 text-sm text-theme-black truncate hover:cursor-pointer">Precio de menor a mayor</label>
                                                    </div>
                                                    <div class="flex items-center m-2">
                                                        <input id="sort-by-price-desc" type="radio" wire:model="sortFilter" value="OrderByPriceDESC" class="h-4 w-6 border-gray-300 rounded text-theme-yellow focus:ring-theme-yellow hover:cursor-pointer" wire:target="sortFilter" wire:loading.attr="disabled">
                                                        <label for="sort-by-price-desc" class="ml-3 text-sm text-theme-black truncate hover:cursor-pointer">Precio de mayor a menor</label>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                            {{-- <div class="py-3 px-5">
                                <div class="space-y-3">
                                    <button type="button" class="flex items-center justify-center w-full rounded-md border border-transparent px-6 py-2 text-sm uppercase shadow hover:opacity-75 text-white font-medium bg-theme-gray">
                                        Aplicar filtros 
                                    </button>
                                    <button type="button" class="flex items-center justify-center w-full rounded-md border border-transparent bg-theme-lwgray px-6 py-2 text-sm font-bold text-theme-gray uppercase shadow hover:opacity-75">
                                        Borrar filtros
                                    </button>
                                </div>
                            </div> --}}
                        </div>
                      </div>
                    
                  </div>
                </div>
              

                <div class="grid grid-cols-1 lg:grid-cols-4 gap-y-4 md:gap-x-8 md:gap-y-10">
                        <!-- Filters -->
                        <div class="col-span-4 md:col-span-1 max-md:hidden min-h-[500px] bg-white rounded-xl shadow-xl p-6">
                            <h3 class="row items-center text-base text-theme-black font-bold uppercase border-b border-gray-200 pb-2">
                                <svg class="w-5 h-5 mr-2" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.45245 3.64247C3.03926 3.64247 2.63705 3.64247 2.23426 3.64247C1.72282 3.64247 1.21081 3.64728 0.699372 3.64067C0.298893 3.63526 -0.0027676 3.31189 0.00301133 2.91039C0.00879026 2.51789 0.306405 2.20715 0.69995 2.20474C1.53558 2.19933 2.37179 2.20294 3.20801 2.20294C3.28602 2.20294 3.36461 2.20294 3.45245 2.20294C3.4825 1.82067 3.59173 1.48708 3.84195 1.2166C4.10894 0.927496 4.43603 0.771221 4.82206 0.76521C5.22543 0.758599 5.62938 0.763407 6.03275 0.763407C6.98974 0.763407 7.48557 1.20338 7.63235 2.20294H7.88431C10.976 2.20294 14.0672 2.20294 17.1589 2.20294C17.245 2.20294 17.3329 2.19813 17.4178 2.21256C17.7651 2.27086 18.0171 2.60385 17.9963 2.96688C17.9755 3.32091 17.6998 3.61182 17.3542 3.63947C17.2757 3.64548 17.1959 3.64187 17.1167 3.64187C14.0395 3.64187 10.9622 3.64187 7.88547 3.64187H7.63351C7.50984 4.46953 7.13305 4.97382 6.4627 5.04534C5.85071 5.11086 5.22138 5.11026 4.6094 5.04354C3.94251 4.97081 3.54029 4.43407 3.45303 3.64247H3.45245Z" fill="black"/>
                                    <path d="M8.98905 7.96297C9.09249 7.02292 9.63109 6.52404 10.5101 6.52344C10.8632 6.52344 11.2162 6.52344 11.5693 6.52344C12.5263 6.52344 13.021 6.96341 13.1689 7.96297C13.2435 7.96297 13.3215 7.96297 13.3989 7.96297C14.6888 7.96297 15.9787 7.95997 17.2691 7.96417C17.8302 7.96598 18.1741 8.54059 17.9088 9.02804C17.7644 9.29371 17.5349 9.40431 17.2431 9.40371C15.9677 9.4007 14.6923 9.4025 13.4163 9.4025H13.1713C13.1516 9.5125 13.1366 9.61408 13.1158 9.71325C12.98 10.3522 12.45 10.8222 11.8242 10.8378C11.3272 10.8505 10.8296 10.8511 10.3326 10.8378C9.60739 10.8186 9.08787 10.2638 8.98905 9.4019C8.90814 9.4019 8.82377 9.4019 8.7394 9.4019C6.07993 9.4019 3.42105 9.4025 0.761586 9.4013C0.2149 9.4013 -0.132992 8.92166 0.0484666 8.42579C0.155955 8.13127 0.405027 7.96297 0.745983 7.96237C1.95667 7.96117 3.16735 7.96237 4.37804 7.96237C5.83375 7.96237 7.28946 7.96237 8.74518 7.96237H8.98962L8.98905 7.96297Z" fill="black"/>
                                    <path d="M7.62431 15.1598C7.59599 15.5715 7.4677 15.9214 7.188 16.1966C6.92044 16.4605 6.59971 16.5963 6.23043 16.5982C5.79066 16.6006 5.35146 16.6006 4.91168 16.5982C4.11997 16.5951 3.56288 16.0788 3.46521 15.2608C3.46175 15.2325 3.45655 15.2049 3.44961 15.1586C3.2225 15.1586 3.00059 15.1586 2.7781 15.1586C2.10081 15.1586 1.42352 15.1604 0.745651 15.158C0.309919 15.1562 -0.0015649 14.8479 0.00248035 14.4301C0.0065256 14.0208 0.313387 13.7215 0.739294 13.7197C1.56106 13.7173 2.38224 13.7191 3.20401 13.7191C3.28202 13.7191 3.36062 13.7191 3.43574 13.7191C3.4733 13.5526 3.49527 13.3975 3.54323 13.2515C3.72989 12.6762 4.23439 12.2922 4.81864 12.2814C5.23646 12.2735 5.65427 12.2796 6.07267 12.2796C6.98805 12.2796 7.50295 12.749 7.62951 13.7191C7.71099 13.7191 7.79594 13.7191 7.88089 13.7191C10.9871 13.7191 14.0927 13.7179 17.1988 13.7233C17.3514 13.7233 17.5184 13.7557 17.6542 13.8255C17.9183 13.9619 18.0472 14.3009 17.9819 14.5912C17.9125 14.902 17.6617 15.1304 17.3572 15.1556C17.2786 15.1622 17.1988 15.1586 17.1197 15.1586C14.0424 15.1586 10.9651 15.1586 7.88841 15.1586H7.62489L7.62431 15.1598Z" fill="black"/>
                                </svg>    
                                Filtros <span class="text-sm font-medium ml-2">({{ $products->total() . ' resultados' }})</span>
                            </h3>
    
                            @if ($totalfiltersApplied > 0)
                            <div x-data="{ open: true }" class="border-b border-gray-200 py-4">
                                <h3 class="-my-3 flow-root">
                                <button type="button" class="py-3 w-full flex items-center justify-between text-sm text-theme-black" aria-controls="filter-section-applied" @click="open = !open" aria-expanded="true" x-bind:aria-expanded="open.toString()">
                                    <span class="text-theme-black font-bold uppercase">{{ __('Filtros aplicados') }}</span>
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
                                <div class="mt-4 max-h-[300px] overflow-auto scrollbar scrollbar-thumb-theme-orange scrollbar-track-gray-100 scrollbar-theme" id="filter-section-applied" x-show="open">
                                    <div class="row">
                                        @foreach($filtersApplied as $filterType => $filterValues)
                                            @if(count($filterValues))
                                                @foreach($filterValues as $keyfilterApplied => $filterValue)
                                                    <div class="row">
                                                        <button type="button"  wire:loading.attr="disabled" wire:target="filtersApplied" wire:click="removeFilter('{{ $filterType }}',{{ $keyfilterApplied }})" 
                                                            class="row items-center text-sm text-theme-gray bg-theme-lwgray border border-theme-lwgray hover:border-theme-yellow hover:cursor-pointer group rounded-xl px-2 py-1 ml-1 mb-1">
                                                            <span>{{ Str::title(__($filterValue)) }}</span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="group-hover:stroke-theme-yellow w-4 h-4">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                            </svg>                                                          
                                                        </button>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div> 
                            @endif
    
                            @foreach ($filters as $keyFilter => $filter)
                                @if (count($filter))
                                    <div x-data="{ open: true }" class="border-b border-gray-200 py-4">
                                        <h3 class="-my-3 flow-root">
                                        <button type="button" class="py-3 w-full flex items-center justify-between text-sm text-theme-black" aria-controls="filter-section-category" @click="open = !open" aria-expanded="true" x-bind:aria-expanded="open.toString()">
                                            <span class="text-theme-black font-bold uppercase">{{ __($keyFilter) }}</span>
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
                                        <div class="mt-4 max-h-[300px] overflow-auto scrollbar scrollbar-thumb-theme-orange scrollbar-track-gray-100 scrollbar-theme" id="filter-section-category" x-show="open">
                                            <div class="space-y-4">
                                                @foreach ($filter as $keyItem => $item)
                                                    <div class="flex items-center m-2">
                                                        <input id="filter-{{ $keyFilter }}-{{ $keyItem }}" type="checkbox" wire:model="filtersApplied.{{ $keyFilter }}" value="{{ $item['name'] }}" class="h-4 w-6 border-gray-300 rounded text-theme-yellow focus:ring-theme-yellow hover:cursor-pointer" wire:target="filtersApplied" wire:loading.attr="disabled">
                                                        <label for="filter-{{ $keyFilter }}-{{ $keyItem }}" class="ml-3 text-sm text-theme-black truncate hover:cursor-pointer">
                                                            {{ __(Str::title($item['name'])) }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>    
                                @endif
                            @endforeach
                        </div>
    
                        <!-- Product Action mobile -->
                        <div class="col-span-4 flex md:hidden justify-between items-center">
                            <div class="flex items-center">
                                <p class="text-base text-theme-gray font-semibold"><span class="text-theme-yellow">{{ $products->count() }}</span> resultado(s)</p>
                            </div>
                            <div class="flex items-center space-x-4">
                                <button type="button" class="btn-grid {{ $view=='grid' ? 'active' : '' }}" wire:click="$set('view','grid')">
                                    <svg class="w-[1rem] h-auto" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 3C1 1.89543 1.89543 1 3 1H5C6.10457 1 7 1.89543 7 3V5C7 6.10457 6.10457 7 5 7H3C1.89543 7 1 6.10457 1 5V3Z" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M11 3C11 1.89543 11.8954 1 13 1H15C16.1046 1 17 1.89543 17 3V5C17 6.10457 16.1046 7 15 7H13C11.8954 7 11 6.10457 11 5V3Z" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M1 13C1 11.8954 1.89543 11 3 11H5C6.10457 11 7 11.8954 7 13V15C7 16.1046 6.10457 17 5 17H3C1.89543 17 1 16.1046 1 15V13Z" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M11 13C11 11.8954 11.8954 11 13 11H15C16.1046 11 17 11.8954 17 13V15C17 16.1046 16.1046 17 15 17H13C11.8954 17 11 16.1046 11 15V13Z" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>    
                                </button>
                                <button type="button" class="btn-list {{ $view=='list' ? 'active' : '' }}" wire:click="$set('view','list')">
                                    <svg class="w-5 h-auto" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L19 1M1 15L19 15M18 9L18 7C18 5.89543 17.1046 5 16 5L4 5C2.89543 5 2 5.89543 2 7V9C2 10.1046 2.89543 11 4 11L16 11C17.1046 11 18 10.1046 18 9Z" fill="" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="flex items-center space-x-4">
                                <button type="button" @click="open = true, option = 'sortBy'">
                                    <svg class="w-[1rem] h-auto" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 15L5 19M5 19L9 15M5 19V1M13 6H18M13 6V4.5C13 3.11929 14.1193 2 15.5 2V2C16.8807 2 18 3.11929 18 4.5V6M13 6V8M18 6V8M13 12H18L13 18H18" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                                <button type="button" @click="open = true, option = 'filters'">
                                    <svg class="w-5 h-auto" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 4H19M9 4C9 5.65685 7.65685 7 6 7C4.34315 7 3 5.65685 3 4M9 4C9 2.34315 7.65685 1 6 1C4.34315 1 3 2.34315 3 4M3 4H1M11 12H1M11 12C11 10.3431 12.3431 9 14 9C15.6569 9 17 10.3431 17 12M11 12C11 13.6569 12.3431 15 14 15C15.6569 15 17 13.6569 17 12M17 12H19" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>    
                                </button>
                            </div>
                        </div>
    
                        @if ($products->count())
                        <!-- Product grid -->
                        <div class="col-span-4 md:col-span-3 flex flex-col">
                            <div class="grid {{ $view=='grid' ? 'grid-cols-2' : 'grid-cols-1' }} md:grid-cols-4 gap-3 md:gap-x-6 md:gap-y-8">
                                @foreach ($products as $item)
                                    @if ($view=='grid')
                                        <x-box-product :item="$item" />
                                    @else
                                        <x-box-product-list :item="$item" />
                                    @endif
                                @endforeach
                            </div>
                            <div class="mt-6 md:mt-20">
                                {{ $products->links() }}
                            </div>
                        </div>
                        @else
                        <!-- Not Product grid -->
                        <div class="col-span-3 mx-auto">
                            <div class="flex flex-col justify-center items-center py-10">
                                <svg class="w-12 h-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                                    <path class="fill-theme-gray" d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z"></path>
                                </svg>
                                <p class="font-bold text-theme-gray">No se encontraron productos</p>
                            </div>
                        </div>
                        @endif                
                </div>
            </div>
        </div>
    </div>
</section>
