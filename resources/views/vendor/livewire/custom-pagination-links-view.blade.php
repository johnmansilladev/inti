<div>
    @if ($paginator->hasPages())
        @php(isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : $this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1)

        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
            <div class="flex justify-between flex-1 sm:hidden">
                <span>
                    @if ($paginator->onFirstPage())
                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md select-none">
                            {!! __('pagination.previous') !!}
                        </span>
                    @else
                        <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            {!! __('pagination.previous') !!}
                        </button>
                    @endif
                </span>

                <span>
                    @if ($paginator->hasMorePages())
                        <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            {!! __('pagination.next') !!}
                        </button>
                    @else
                        <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md select-none">
                            {!! __('pagination.next') !!}
                        </span>
                    @endif
                </span>
            </div>

            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700 leading-5">
                        <span>{!! __('Showing') !!}</span>
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        <span>{!! __('to') !!}</span>
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                        <span>{!! __('of') !!}</span>
                        <span class="font-medium">{{ $paginator->total() }}</span>
                        <span>{!! __('results') !!}</span>
                    </p>
                </div>

                <div class="flex justify-center items-center my-2">
        
                    @if ( ! $paginator->onFirstPage())
                        {{-- First Page Link --}}
                        <a
                        class="mx-1 w-[35px] h-[35px] flex items-center justify-center bg-black border-2 border-black text-white font-bold text-center hover:bg-theme-lgray2 hover:border-theme-lgray2 rounded-lg  cursor-pointer"
                        wire:click="gotoPage(1)"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path></svg>
                        </a>
                        @if($paginator->currentPage() > 2)
                        {{-- Previous Page Link --}}
                        <a
                            class="mx-1 w-[35px] h-[35px] flex items-center justify-center bg-black border-2 border-black text-white font-bold text-center hover:bg-theme-lgray2 hover:border-theme-lgray2 rounded-lg  cursor-pointer"
                            wire:click="previousPage"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        </a>
                        @endif
                    @endif
            
                    <!-- Pagination Elements -->
                    @foreach ($elements as $element)
                        <!-- Array Of Links -->
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                <!--  Use three dots when current page is greater than 3.  -->
                                @if ($paginator->currentPage() > 3 && $page === 2)
                                    <div class="text-theme-lgray mx-1">
                                        <span class="font-bold">.</span>
                                        <span class="font-bold">.</span>
                                        <span class="font-bold">.</span>
                                    </div>
                                @endif
            
                                <!--  Show active page two pages before and after it.  -->
                                @if ($page == $paginator->currentPage())
                                    <span class="mx-1 w-[35px] h-[35px] flex items-center justify-center border-2 border-theme-yellow bg-theme-yellow text-white hover:bg-theme-lyellow hover:border-theme-lyellow font-bold text-center rounded-lg  cursor-pointer">{{ $page }}</span>
                                @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 2 || $page === $paginator->currentPage() - 1 || $page === $paginator->currentPage() - 2)
                                    <a class="mx-1 w-[35px] h-[35px] flex items-center justify-center border-2 border-theme-lgray text-theme-lgray font-bold text-center hover:text-theme-lgray2 hover:border-theme-lgray2 rounded-lg  cursor-pointer" wire:click="gotoPage({{$page}})">{{ $page }}</a>
                                @endif
            
                                <!--  Use three dots when current page is away from end.  -->
                                @if ($paginator->currentPage() < $paginator->lastPage() - 2  && $page === $paginator->lastPage() - 1)
                                    <div class="text-theme-lgray mx-1">
                                        <span class="font-bold">.</span>
                                        <span class="font-bold">.</span>
                                        <span class="font-bold">.</span>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    
                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        @if($paginator->lastPage() - $paginator->currentPage() >= 2)
                            <a class="mx-1 w-[35px] h-[35px] flex items-center justify-center bg-black border-2 border-black text-white font-bold text-center hover:bg-theme-lgray2 hover:border-theme-lgray2 rounded-lg cursor-pointer"
                            wire:click="nextPage"
                            rel="next">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        @endif
                        <a
                            class="mx-1 w-[35px] h-[35px] flex items-center justify-center bg-black border-2 border-black text-white font-bold text-center hover:bg-theme-lgray2 hover:border-theme-lgray2 rounded-lg cursor-pointer"
                            wire:click="gotoPage({{ $paginator->lastPage() }})"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path></svg>
                        </a>
                    @endif
                </div>
            </div>
        </nav>
    @endif
</div>

