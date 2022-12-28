@props(['item'])
<a href="{{ route('product.index',$item) }}" class="relative bg-white flex flex-col h-full rounded-2xl shadow-xl group">
    <div class="relative overflow-hidden">
        <figure>
            <img class="object-cover object-center" src="{{ Storage::url( $item->stockKeepingUnits->first()->images->first()->url) }}" alt="{{ Str::title($item->name) }}">
        </figure>
        <div class="absolute top-5 right-5">
            <div class="flex justify-center items-center bg-theme-yellow rounded-full drop-shadow-3xl w-12 h-12">
                <svg class="w-8 h-8" viewBox="0 0 27 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.5035 27.4012C12.9517 27.1005 12.4341 26.9075 12.0276 26.5778C11.4673 26.1252 10.9993 25.5597 10.4765 25.061C9.65661 24.2786 8.67953 23.8686 7.53504 23.8789C6.85348 23.8857 6.17191 23.8874 5.49034 23.8789C4.23995 23.8601 3.3756 23.0026 3.34486 21.7436C3.32777 21.0621 3.32436 20.3805 3.34486 19.6989C3.37731 18.5203 2.92977 17.5432 2.12692 16.7113C1.65375 16.2211 1.16008 15.7496 0.686915 15.2611C-0.225258 14.3199 -0.221841 13.1463 0.695456 12.1966C1.19766 11.6756 1.72379 11.1768 2.22599 10.6558C2.96906 9.88711 3.34827 8.96469 3.34144 7.88853C3.33631 7.22746 3.33631 6.5681 3.34144 5.90703C3.3534 4.4619 4.18699 3.61293 5.64237 3.57535C6.34444 3.55827 7.04821 3.56169 7.75028 3.56852C8.78715 3.57877 9.65832 3.18589 10.3963 2.48382C10.936 1.96966 11.4451 1.42304 11.9849 0.91058C12.9295 0.0137809 14.0552 0.0103643 15.0032 0.903747C15.5311 1.39912 16.0265 1.92866 16.5457 2.43428C17.311 3.17735 18.2146 3.59073 19.2993 3.57194C20.0014 3.55998 20.7052 3.55486 21.4072 3.57877C22.8216 3.62831 23.6416 4.48411 23.6535 5.89849C23.6586 6.58006 23.6552 7.26163 23.6552 7.94319C23.6552 8.97152 24.0174 9.85807 24.7194 10.6011C25.1875 11.0965 25.6794 11.568 26.1594 12.0531C27.2646 13.1685 27.2732 14.2874 26.1833 15.3926C25.7358 15.847 25.2763 16.2928 24.8339 16.754C24.0327 17.591 23.6074 18.5767 23.6501 19.7536C23.6723 20.3703 23.6586 20.9886 23.6518 21.607C23.6381 23.0299 22.796 23.8618 21.3867 23.884C20.4524 23.8994 19.4889 23.8106 18.5956 24.0172C17.8457 24.1915 17.1334 24.6612 16.4911 25.1207C15.9274 25.5239 15.5174 26.1371 14.9725 26.5761C14.5642 26.9058 14.0501 27.1039 13.5 27.4046L13.5035 27.4012ZM11.1752 18.1735C11.5476 17.9498 11.8756 17.8029 12.142 17.5842C13.3924 16.5593 14.6274 15.5156 15.8659 14.477C17.1368 13.4111 18.4162 12.352 19.6751 11.2707C20.3875 10.6592 20.3123 9.70434 19.5094 9.52156C19.1507 9.43957 18.6195 9.62063 18.3154 9.86661C16.1853 11.5953 14.0928 13.3735 11.9883 15.1364C11.3494 15.671 11.3528 15.6727 10.8318 14.9843C10.1127 14.0346 9.39868 13.0814 8.66416 12.1436C8.23369 11.5936 7.68707 11.4996 7.22074 11.8515C6.74586 12.2085 6.66899 12.7569 7.08237 13.3103C8.1517 14.7418 9.23469 16.163 10.3399 17.5671C10.5312 17.8114 10.8575 17.9498 11.1752 18.1752V18.1735Z" fill="#323232"/>
                    <path d="M19.7709 40.6873C19.4463 40.4174 19.2294 40.2654 19.0466 40.0792C17.5485 38.5658 16.0573 37.0438 14.5592 35.5303C13.8127 34.777 13.3806 34.7787 12.617 35.5303C11.0386 37.0848 9.46368 38.6426 7.88531 40.1971C7.72474 40.3559 7.5488 40.5011 7.25157 40.7676C7.2157 40.3987 7.17642 40.1851 7.17642 39.9716C7.173 35.5201 7.173 31.0685 7.17471 26.6153C7.17471 25.8432 7.22595 25.768 7.97926 25.9457C8.39265 26.043 8.80774 26.2719 9.13742 26.5435C9.66183 26.9757 10.1094 27.4984 10.5996 27.9716C12.3437 29.6576 14.6685 29.6524 16.4126 27.9596C16.8704 27.5138 17.3094 27.0492 17.774 26.6102C17.9875 26.4086 18.2216 26.207 18.4829 26.0772C19.4754 25.5887 19.8221 25.8073 19.8221 26.8869C19.8221 31.1676 19.8221 35.45 19.8204 39.7307C19.8204 39.9955 19.7931 40.2586 19.7709 40.6856V40.6873Z" fill="#323232"/>
                    <path d="M11.177 18.1717C10.8592 17.9462 10.533 17.8079 10.3417 17.5636C9.23647 16.1595 8.15347 14.7383 7.08415 13.3068C6.67077 12.7551 6.74934 12.205 7.22251 11.848C7.69055 11.4961 8.23547 11.5901 8.66593 12.1401C9.40045 13.0779 10.1145 14.0328 10.8336 14.9808C11.3546 15.6692 11.3512 15.6692 11.9901 15.1329C14.0928 13.37 16.1854 11.5935 18.3172 9.86309C18.6213 9.61711 19.1525 9.43605 19.5112 9.51804C20.3141 9.70082 20.3892 10.6557 19.6769 11.2672C18.418 12.3485 17.1403 13.4076 15.8677 14.4735C14.6292 15.5121 13.3942 16.5558 12.1438 17.5807C11.8756 17.7993 11.5494 17.9462 11.177 18.17V18.1717Z" fill="white"/>
                </svg>                                        
            </div>
        </div>
    </div>
    <div class="px-6 pb-5 flex-1 flex flex-col">
        <h1 class="text-base font-bold text-black mb-1">{{ Str::limit(Str::title($item->name), 50, ' ...') }}</h1>
        <p class="text-sm font-semibold mb-1">{{ Str::title($item->brand->name) }}</p>
        <div class="flex items-center mb-1">
            <ul class="flex items-center space-x-1 text-xs mb-1 mr-2">
                <li>
                    <i class='bx bxs-star text-xl text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange'></i>
                </li>
                <li>
                    <i class='bx bxs-star text-xl text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange'></i>
                </li>
                <li>
                    <i class='bx bxs-star text-xl text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange'></i>
                </li>
                <li>
                    <i class='bx bxs-star text-xl text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange'></i>
                </li>
                <li>
                    <i class='bx bxs-star text-xl text-gray-200'></i>
                </li>
            </ul>
            <p class="text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange">4.8</p>
        </div>
        <p class="text-base font-semibold mb-2"> {{ $item->stockKeepingUnits->first()->services->first()->pivot->currency_type_id }} 49.90<span class="line-through text-gray-500 text-sm text-red-500 ml-3"> {{ $item->stockKeepingUnits->first()->services->first()->pivot->currency_type_id }} {{ $item->stockKeepingUnits->first()->services->first()->pivot->base_price }}</span></p>
        <button type="button" class="mt-auto flex items-center justify-center w-full py-1 border border-transparent text-base font-bold rounded-md text-white uppercase bg-gradient-to-r from-theme-yellow to-theme-orange">comprar</button>
    </div>
    <div class="absolute bg-white bottom-0 -mb-[7.5rem] opacity-0 group-hover:opacity-100 rounded-b-2xl shadow-2xl transition duration-400" style="z-index: 999;">
        <div class="flex-1 flex flex-col px-6 pb-5 h-[160px]">
            <p class="text-xs font-medium break-all mb-2">{{ Str::limit($item->description_short,180, ' ...') }}</p>
            <button type="button" class="mt-auto flex items-center justify-center w-full py-1 border border-transparent text-base font-bold rounded-md text-white uppercase bg-gradient-to-r from-theme-yellow to-theme-orange">comprar</button>
        </div>
        <button type="button" class="flex items-center justify-center w-full py-2 border border-transparent text-base font-bold rounded-b-2xl text-theme-gray uppercase bg-theme-lgray">
            <svg class="mr-2" width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18.7522 7.18207L19.458 6.92845L18.7522 7.18207ZM18.7522 8.81793L19.458 9.07155L18.7522 8.81793ZM1.95363 7.43569C2.58019 5.69203 4.58028 1.75 10 1.75V0.25C3.61572 0.25 1.24299 4.97766 0.542001 6.92845L1.95363 7.43569ZM10 1.75C15.4197 1.75 17.4198 5.69204 18.0464 7.43569L19.458 6.92845C18.757 4.97766 16.3843 0.25 10 0.25V1.75ZM0.542001 9.07155C1.24299 11.0223 3.61572 15.75 10 15.75V14.25C4.58028 14.25 2.58019 10.308 1.95363 8.56431L0.542001 9.07155ZM10 15.75C16.3843 15.75 18.757 11.0223 19.458 9.07155L18.0464 8.56431C17.4198 10.308 15.4197 14.25 10 14.25V15.75ZM10 11.75C12.0711 11.75 13.75 10.0711 13.75 8H12.25C12.25 9.24264 11.2426 10.25 10 10.25V11.75ZM13.75 8C13.75 5.92893 12.0711 4.25 10 4.25V5.75C11.2426 5.75 12.25 6.75736 12.25 8H13.75ZM10 4.25C7.92893 4.25 6.25 5.92893 6.25 8H7.75C7.75 6.75736 8.75736 5.75 10 5.75V4.25ZM6.25 8C6.25 10.0711 7.92893 11.75 10 11.75V10.25C8.75736 10.25 7.75 9.24264 7.75 8H6.25ZM18.0464 7.43569C18.1785 7.80347 18.1785 8.19653 18.0464 8.56431L19.458 9.07155C19.708 8.37587 19.708 7.62413 19.458 6.92845L18.0464 7.43569ZM0.542001 6.92845C0.29202 7.62413 0.29202 8.37587 0.542001 9.07155L1.95363 8.56431C1.82148 8.19653 1.82148 7.80347 1.95363 7.43569L0.542001 6.92845Z" fill="#323232"/>
            </svg>    
            VISTA PREVIA
        </button>
    </div>
</a>