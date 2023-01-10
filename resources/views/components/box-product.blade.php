@props(['item'])
<article class="relative bg-white flex flex-col h-full overflow-hidden rounded-2xl shadow-xl group">
    <div class="relative overflow-hidden">
        <a href="{{ route('product.index',$item) }}">
            <figure class="aspect-w-16 aspect-h-9">
                <img class="object-cover object-center" src="{{ Storage::url($item->stockKeepingUnits->first()->images->first()->url) }}" alt="{{ Str::title($item->name) }}">
            </figure>
            @if ($item->stockKeepingUnits->first()->services->first()->pivot->dcto > 0)
            <div class="absolute top-2 left-2">
                <div class="flex justify-center items-center bg-[#FF0000] rounded-lg drop-shadow-3xl px-2 py-1.5">
                    <span class="text-xs font-bold text-white">-{{ number_format($item->stockKeepingUnits->first()->services->first()->pivot->dcto) }}%</span>
                </div>
            </div>
            @endif
        </a>
    </div>
    <div class="px-6 pb-2 flex-1 flex flex-col">
        <a href="{{ route('product.index',$item) }}"><h1 class="text-base font-bold text-black uppercase mb-1">{{ Str::limit(Str::title($item->name), 50, ' ...') }}</h1></a>
        <p class="text-sm font-semibold mb-1">{{ Str::title($item->brand->name) }}</p>
        <div class="flex items-center mb-1">
            <ul class="flex items-center space-x-1 text-xs mb-1 mr-2">
                <li>
                    <i class='bx bxs-star text-xl  {{ $item->rating >= 1 ? 'text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange' : 'text-gray-200' }}'></i>
                <li>
                    <i class='bx bxs-star text-xl {{ $item->rating >= 2 ? 'text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange' : 'text-gray-200' }}'></i>
                </li>
                <li>
                    <i class='bx bxs-star text-xl {{ $item->rating >= 3 ? 'text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange' : 'text-gray-200' }}'></i>
                </li>
                <li>
                    <i class='bx bxs-star text-xl {{ $item->rating >= 4 ? 'text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange' : 'text-gray-200' }}'></i>
                </li>
                <li>
                    <i class='bx bxs-star text-xl {{ $item->rating == 5 ? 'text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange' : 'text-gray-200' }}'></i>
                </li>
            </ul>
            <p class="text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange">{{ $item->rating }}</p>
        </div>
        <p class="text-base font-semibold mb-2"> 
            $ {{ $item->stockKeepingUnits->first()->services->first()->pivot->sale_price }}
            @if ($item->stockKeepingUnits->first()->services->first()->pivot->sale_price < $item->stockKeepingUnits->first()->services->first()->pivot->base_price)
            <span class="line-through text-gray-500 text-sm text-red-500 ml-3">$ {{ $item->stockKeepingUnits->first()->services->first()->pivot->base_price }}</span> 
            @endif
        </p>
    </div>
    <div class="flex flex-row bg-theme-gray rounded-b-3xl">
        <button type="button" onclick="showModalQuickViewsProduct('{{ $item->id }}')" class="flex items-center justify-center w-8/12 py-2 border border-transparent text-base font-bold  text-white uppercase bg-theme-gray">
            <svg class="mr-2 w-6 h-6" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="fill-white" d="M18.7522 7.18207L19.458 6.92845L18.7522 7.18207ZM18.7522 8.81793L19.458 9.07155L18.7522 8.81793ZM1.95363 7.43569C2.58019 5.69203 4.58028 1.75 10 1.75V0.25C3.61572 0.25 1.24299 4.97766 0.542001 6.92845L1.95363 7.43569ZM10 1.75C15.4197 1.75 17.4198 5.69204 18.0464 7.43569L19.458 6.92845C18.757 4.97766 16.3843 0.25 10 0.25V1.75ZM0.542001 9.07155C1.24299 11.0223 3.61572 15.75 10 15.75V14.25C4.58028 14.25 2.58019 10.308 1.95363 8.56431L0.542001 9.07155ZM10 15.75C16.3843 15.75 18.757 11.0223 19.458 9.07155L18.0464 8.56431C17.4198 10.308 15.4197 14.25 10 14.25V15.75ZM10 11.75C12.0711 11.75 13.75 10.0711 13.75 8H12.25C12.25 9.24264 11.2426 10.25 10 10.25V11.75ZM13.75 8C13.75 5.92893 12.0711 4.25 10 4.25V5.75C11.2426 5.75 12.25 6.75736 12.25 8H13.75ZM10 4.25C7.92893 4.25 6.25 5.92893 6.25 8H7.75C7.75 6.75736 8.75736 5.75 10 5.75V4.25ZM6.25 8C6.25 10.0711 7.92893 11.75 10 11.75V10.25C8.75736 10.25 7.75 9.24264 7.75 8H6.25ZM18.0464 7.43569C18.1785 7.80347 18.1785 8.19653 18.0464 8.56431L19.458 9.07155C19.708 8.37587 19.708 7.62413 19.458 6.92845L18.0464 7.43569ZM0.542001 6.92845C0.29202 7.62413 0.29202 8.37587 0.542001 9.07155L1.95363 8.56431C1.82148 8.19653 1.82148 7.80347 1.95363 7.43569L0.542001 6.92845Z" fill="#323232"/>
            </svg>    
            VISTA PREVIA
        </button>
        <button type="button" onclick="addToCartProduct('{{ $item->id }}')" class="flex items-center justify-center w-4/12 py-2 border border-transparent text-base font-bold rounded-tl-2xl rounded-br-2xl text-theme-gray uppercase bg-theme-yellow hover:bg-gradient-to-r hover:from-theme-yellow hover:to-theme-orange"> 
            <svg class="mr-2 w-6 h-6" viewBox="0 0 63 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="fill-theme-gray" fill-rule="evenodd" clip-rule="evenodd" d="M0.147949 1.7184C0.147949 0.777998 0.910271 0.015625 1.85073 0.015625H5.36333C7.64624 0.015625 9.62401 1.52468 10.2598 3.66692H59.1065C61.2556 3.66692 62.8674 5.633 62.4459 7.74033L57.6382 31.7788C57.3307 33.3163 56.0132 34.4452 54.4467 34.5132L15.8082 36.1932L16.4836 40.1794L21.0199 40.1795L48.4042 40.1794C52.3694 40.1795 55.5838 43.3939 55.5838 47.3591C55.5838 51.3243 52.3694 54.5388 48.4042 54.5388C44.439 54.5388 41.2245 51.3243 41.2245 47.3591C41.2245 45.9746 41.6165 44.6816 42.2954 43.585H27.1286C27.8076 44.6816 28.1995 45.9746 28.1995 47.3591C28.1995 51.3243 24.9851 54.5388 21.0199 54.5388C17.0546 54.5388 13.8401 51.3243 13.8401 47.3591C13.8401 45.8494 14.306 44.4486 15.102 43.2926C14.0856 42.8409 13.3217 41.9039 13.1259 40.7483L7.0422 4.8395C6.90346 4.02054 6.19393 3.42118 5.36333 3.42118H1.85073C0.910271 3.42118 0.147949 2.65881 0.147949 1.7184ZM17.2457 47.3591C17.2457 45.2747 18.9355 43.585 21.0199 43.585C23.1042 43.585 24.794 45.2747 24.794 47.3591C24.794 49.4435 23.1042 51.1332 21.0199 51.1332C18.9355 51.1332 17.2457 49.4435 17.2457 47.3591ZM48.4042 43.585C46.3199 43.585 44.6301 45.2747 44.6301 47.3591C44.6301 49.4435 46.3199 51.1332 48.4042 51.1332C50.4886 51.1332 52.1783 49.4435 52.1783 47.3591C52.1783 45.2747 50.4886 43.585 48.4042 43.585ZM15.2349 32.8093L10.8745 7.07248H59.1065L54.2989 31.1109L15.2349 32.8093ZM21.0198 49.1143C21.9891 49.1143 22.7749 48.3285 22.7749 47.3591C22.7749 46.3898 21.9891 45.604 21.0198 45.604C20.0504 45.604 19.2646 46.3898 19.2646 47.3591C19.2646 48.3285 20.0504 49.1143 21.0198 49.1143ZM50.1594 47.3591C50.1594 48.3285 49.3735 49.1143 48.4042 49.1143C47.4348 49.1143 46.649 48.3285 46.649 47.3591C46.649 46.3898 47.4348 45.604 48.4042 45.604C49.3735 45.604 50.1594 46.3898 50.1594 47.3591ZM18.9679 13.513C18.9679 12.5725 19.7302 11.8102 20.6707 11.8102C21.611 11.8102 22.3734 12.5725 22.3734 13.513V16.2505C22.3734 17.1909 21.611 17.9533 20.6707 17.9533C19.7302 17.9533 18.9679 17.1909 18.9679 16.2505V13.513ZM25.9886 13.513C25.9886 12.5725 26.7509 11.8102 27.6914 11.8102C28.6317 11.8102 29.3942 12.5725 29.3942 13.513V16.2505C29.3942 17.1909 28.6317 17.9533 27.6914 17.9533C26.7509 17.9533 25.9886 17.1909 25.9886 16.2505V13.513ZM34.712 11.8102C33.7716 11.8102 33.0093 12.5725 33.0093 13.513V16.2505C33.0093 17.1909 33.7716 17.9533 34.712 17.9533C35.6524 17.9533 36.4148 17.1909 36.4148 16.2505V13.513C36.4148 12.5725 35.6524 11.8102 34.712 11.8102ZM40.03 13.513C40.03 12.5725 40.7923 11.8102 41.7328 11.8102C42.6731 11.8102 43.4355 12.5725 43.4355 13.513V16.2505C43.4355 17.1909 42.6731 17.9533 41.7328 17.9533C40.7923 17.9533 40.03 17.1909 40.03 16.2505V13.513ZM48.7534 11.8102C47.8129 11.8102 47.0506 12.5725 47.0506 13.513V16.2505C47.0506 17.1909 47.8129 17.9533 48.7534 17.9533C49.6937 17.9533 50.4562 17.1909 50.4562 16.2505V13.513C50.4562 12.5725 49.6937 11.8102 48.7534 11.8102ZM18.9679 22.2888C18.9679 21.3484 19.7302 20.586 20.6707 20.586C21.611 20.586 22.3734 21.3484 22.3734 22.2888V25.0263C22.3734 25.9668 21.611 26.7291 20.6707 26.7291C19.7302 26.7291 18.9679 25.9668 18.9679 25.0263V22.2888ZM27.6914 20.586C26.7509 20.586 25.9886 21.3484 25.9886 22.2888V25.0263C25.9886 25.9668 26.7509 26.7291 27.6914 26.7291C28.6317 26.7291 29.3942 25.9668 29.3942 25.0263V22.2888C29.3942 21.3484 28.6317 20.586 27.6914 20.586ZM33.0093 22.2888C33.0093 21.3484 33.7716 20.586 34.712 20.586C35.6524 20.586 36.4148 21.3484 36.4148 22.2888V25.0263C36.4148 25.9668 35.6524 26.7291 34.712 26.7291C33.7716 26.7291 33.0093 25.9668 33.0093 25.0263V22.2888ZM41.7328 20.586C40.7923 20.586 40.03 21.3484 40.03 22.2888V25.0263C40.03 25.9668 40.7923 26.7291 41.7328 26.7291C42.6731 26.7291 43.4355 25.9668 43.4355 25.0263V22.2888C43.4355 21.3484 42.6731 20.586 41.7328 20.586ZM47.0506 22.2888C47.0506 21.3484 47.8129 20.586 48.7534 20.586C49.6937 20.586 50.4562 21.3484 50.4562 22.2888V25.0263C50.4562 25.9668 49.6937 26.7291 48.7534 26.7291C47.8129 26.7291 47.0506 25.9668 47.0506 25.0263V22.2888Z" fill="#FDC700"/>
            </svg>  
        </button>
    </div>
</article>