<div>
    @if ($paginator->hasPages())
    <div class="flex justify-center items-center my-2">
        
        @if ( ! $paginator->onFirstPage())
            {{-- First Page Link --}}
            <a
            class="mx-1 w-[35px] h-[35px] flex items-center justify-center bg-theme-gray border-2 border-theme-gray text-white font-bold text-center hover:bg-theme-lgray2 hover:border-theme-lgray2 rounded-lg  cursor-pointer"
            wire:click="gotoPage(1)"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path></svg>
            </a>
            @if($paginator->currentPage() > 2)
            {{-- Previous Page Link --}}
            <a
                class="mx-1 w-[35px] h-[35px] flex items-center justify-center bg-theme-gray border-2 border-theme-gray text-white font-bold text-center hover:bg-theme-lgray2 hover:border-theme-lgray2 rounded-lg  cursor-pointer"
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
                <a class="mx-1 w-[35px] h-[35px] flex items-center justify-center bg-theme-gray border-2 border-theme-gray text-white font-bold text-center hover:bg-theme-lgray2 hover:border-theme-lgray2 rounded-lg cursor-pointer"
                wire:click="nextPage"
                rel="next">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            @endif
            <a
                class="mx-1 w-[35px] h-[35px] flex items-center justify-center bg-theme-gray border-2 border-theme-gray text-white font-bold text-center hover:bg-theme-lgray2 hover:border-theme-lgray2 rounded-lg cursor-pointer"
                wire:click="gotoPage({{ $paginator->lastPage() }})"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path></svg>
            </a>
        @endif
    </div>
@endif
</div>