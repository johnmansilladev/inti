<div x-data>
    <section>
        <div class="section-product-detail">
            <nav aria-label="Breadcrumb" class="container-breadcrumb">
                <ol role="list">
                    <li>
                        <div class="flex items-center">
                            <a href="{{ route('home') }}" class="mr-1 md:mr-4 text-sm font-semibold text-theme-gray capitalize hover:opacity-75">Home</a>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="h-5 w-auto text-theme-gray">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                              
                        </div>
                    </li>

                    <li>
                        <div class="flex items-center">
                            <a href="{{ route('shop',['shop_section' => 'category', 'shop_section_url' => $product->category->slug]) }}" class="mr-1 md:mr-4 text-sm font-semibold text-theme-gray capitalize hover:opacity-75">{{ Str::title($product->category->name) }}</a>
                            {{-- <svg viewBox="0 0 6 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-5 w-auto text-theme-gray">
                                <path d="M4.878 4.34H3.551L.27 16.532h1.327l3.281-12.19z" fill="currentColor" />
                            </svg> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="h-5 w-auto text-theme-gray">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </div>
                    </li>
                    <li class="text-sm">
                        <a href="#" aria-current="page" class="font-semibold text-theme-yellow hover:opacity-75 pointer-events-none">{{ Str::title($product->name) }}</a>
                    </li>
                </ol>
            </nav>

            <div class="container-product-detail">

                <!-- Product info mobile -->
                <div class="content-product-detail-info-mobile">
                    <h1 class="content-product-detail-info-title">{{ $product->name }} - {{ $sku_selected->name }}</h1>
                    <div class="flex justify-between items-center mt-3">
                        <div class="text-sm font-bold text-theme-gray uppercase">
                            <a href="">{{ $product->brand->name }}</a>
                        </div>
                        <div class="flex items-center">
                            <ul class="flex items-center space-x-1 text-xs mb-1 mr-2">
                                <li>
                                    <i class='bx bxs-star text-xl  {{ $product->rating >= 1 ? 'text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange' : 'text-gray-200' }}'></i>
                                <li>
                                    <i class='bx bxs-star text-xl {{ $product->rating >= 2 ? 'text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange' : 'text-gray-200' }}'></i>
                                </li>
                                <li>
                                    <i class='bx bxs-star text-xl {{ $product->rating >= 3 ? 'text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange' : 'text-gray-200' }}'></i>
                                </li>
                                <li>
                                    <i class='bx bxs-star text-xl {{ $product->rating >= 4 ? 'text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange' : 'text-gray-200' }}'></i>
                                </li>
                                <li>
                                    <i class='bx bxs-star text-xl {{ $product->rating == 5 ? 'text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange' : 'text-gray-200' }}'></i>
                                </li>
                            </ul>
                            <p class="text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange">{{ $product->rating }}</p>
                        </div>
                    </div>
                </div>


                <!-- Image gallery -->
                <div class="content-product-detail-image">
                    <!-- Image selector -->
                    <div class="carousel-img-product">    
                        @foreach ($sku_selected->images as $key => $image)
                        <button type="button" wire:click="$set('img_selected','{{ Storage::url($image->url) }}')" class="carousel-img-product-item {{ $img_selected == Storage::url($image->url) ? 'active' : '' }}">
                            <img src="{{ Storage::url($image->url ?? 'products/no-image.png') }}" title="{{ $product->name }}" alt="{{ $product->name }}" class="w-full h-auto object-center object-cover">
                        </button>
                        @endforeach
                    </div>

                    <!-- Image main -->
                    <div class="main-img-product">
                        <img src="{{ $img_selected }}" title="{{ $product->name }}" alt="{{ $product->name }}" class="w-full h-auto object-center object-cover">
                    </div>
                </div>
                <!-- Product info -->
                <div class="content-product-detail-info">
                    <div class="max-md:hidden">
                        <h1 class="content-product-detail-info-title">{{ $product->name }} - {{ $sku_selected->name }}</h1>

                        <div class="flex justify-between items-center mt-3">
                            <div class="text-sm font-bold text-theme-gray uppercase">
                                <a href="">{{ $product->brand->name }}</a>
                            </div>
                            <div class="flex items-center">
                                <ul class="flex items-center space-x-1 text-xs mb-1 mr-2">
                                    <li>
                                        <i class='bx bxs-star text-xl  {{ $product->rating >= 1 ? 'text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange' : 'text-gray-200' }}'></i>
                                    <li>
                                        <i class='bx bxs-star text-xl {{ $product->rating >= 2 ? 'text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange' : 'text-gray-200' }}'></i>
                                    </li>
                                    <li>
                                        <i class='bx bxs-star text-xl {{ $product->rating >= 3 ? 'text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange' : 'text-gray-200' }}'></i>
                                    </li>
                                    <li>
                                        <i class='bx bxs-star text-xl {{ $product->rating >= 4 ? 'text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange' : 'text-gray-200' }}'></i>
                                    </li>
                                    <li>
                                        <i class='bx bxs-star text-xl {{ $product->rating == 5 ? 'text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange' : 'text-gray-200' }}'></i>
                                    </li>
                                </ul>
                                <p class="text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange">{{ $product->rating }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="max-md:hidden mt-4">
                        <h3 class="sr-only">Description</h3>

                        <div class="text-justify text-sm text-gray-700 space-y-6">
                            <p>{{ $sku_selected->description }}</p>
                        </div>
                    </div>


                    @if($specification_groups->count()>0)
                    <div aria-labelledby="details-heading" class="mt-6 w-full">
                        <h2 id="details-heading" class="sr-only">Caracteristicas</h2>
                        
                        @if ($product->interfases->count())
                        <div class="bg-theme-lwgray rounded-lg p-4 md:p-6 mb-2">
                            <div x-data="{ open: true }">
                                <h3>
                                    <button type="button"
                                        class="group relative w-full flex justify-between items-center text-left"
                                        :class="open ? 'pb-2' : ''" aria-controls="interface-1"
                                        @click="open = !open" x-bind:aria-expanded="open">
                                        <span class="text-theme-gray text-sm font-semibold">Interfaces Probadas</span>
                                        <span class="ml-6 flex items-center">
                                            <svg class="h-5 w-5" x-show="!(open)" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                                                style="display: none;">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <svg class="h-5 w-5" x-show="open" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <div class="prose prose-sm" id="interface-1" x-show="open">
                                    <div role="list">
                                        @foreach ($product->interfases as $interfase)
                                            <span>{{ $interfase->name}} {{ $loop->last ? '' : ',' }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @foreach ($specification_groups as $specification_group)
                            @if ($loop->first)
                            <div class="bg-theme-lwgray rounded-lg p-4 md:p-6">
                                <div x-data="{ open: true }">
                                    <h3>
                                        <button type="button"
                                            class="group relative w-full flex justify-between items-center text-left"
                                            :class="open ? 'pb-2' : ''" aria-controls="disclosure-1"
                                            @click="open = !open" x-bind:aria-expanded="open">
                                            <span class="text-theme-gray text-sm font-semibold"> {{ $specification_group->name }} </span>
                                            <span class="ml-6 flex items-center">
                                                <svg class="h-5 w-5" x-show="!(open)" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                                                    style="display: none;">
                                                    <path fill-rule="evenodd"
                                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg class="h-5 w-5" x-show="open" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </span>
                                        </button>
                                    </h3>
                                    <div class="prose prose-sm" id="disclosure-1" x-show="open">
                                        <ul role="list">
                                            @foreach ($specification_group->specifications as $specification)
                                            <li>
                                                <span class="font-semibold text-theme-gray">{{ $specification->name }}:</span>
                                                @foreach (array_unique($specification->specificationValues->pluck('name')->toArray()) as $specification_value)
                                                    <span>{{ $specification_value}} {{ $loop->last ? '' : ',' }}</span>
                                                @endforeach 
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach

                        @if ($sku_selected->services->count())
                            @livewire('frontend.products.add-cart-item-service', ['product' => $product])
                        @else
                            no hay nada versiones disponibles para el producto.
                        @endif
                        
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @if ($specification_groups->count()>1)
    <section>
        <div class="container pt-2 pb-6 md:pb-12 md:pt-6">
            <div x-data="{ tab: 1 }">
                <ul class="grid grid-cols-3 gap-2 md:gap-20">
                    @foreach ($specification_groups as $key => $specification_group)
                        @if($specification_group->id != 1)
                            <li @click="tab = {{ $key }}" class="py-2 text-xs md:text-base text-center flex items-center justify-center font-bold text-theme-gray rounded-lg hover:cursor-pointer" :class="tab == {{ $key }} ? 'bg-theme-yellow' : 'bg-theme-lwgray'">{{ $specification_group->name }}</li>
                        @endif
                    @endforeach
                    {{-- <li @click="tab = 1" class="py-2 text-xs md:text-base text-center flex items-center justify-center font-bold text-theme-gray rounded-lg hover:cursor-pointer" :class="tab == 1 ? 'bg-theme-yellow' : 'bg-theme-lwgray'">Información General</li> --}}
                    {{-- <li @click="tab = 2" class="py-2 text-xs md:text-base text-center flex items-center justify-center font-bold text-theme-gray rounded-lg hover:cursor-pointer" :class="tab == 2 ? 'bg-theme-yellow' : 'bg-theme-lwgray'">Actualización</li> --}}
                    {{-- <li @click="tab = 3" class="py-2 text-xs md:text-base text-center flex items-center justify-center font-bold text-theme-gray rounded-lg hover:cursor-pointer" :class="tab == 3 ? 'bg-theme-yellow' : 'bg-theme-lwgray'">Vehiculos Compatibles</li> --}}
                </ul>
                <div class="mt-4 md:mt-8">
                    @foreach($specification_groups as $key => $specification_group)
                        @if($specification_group->id != 1)
                        <div x-show="tab === {{ $key }}" class="text-sm max-h-80 overflow-auto scrollbar scrollbar-thumb-theme-yellow scrollbar-track-gray-100 scrollbar-theme">
                            no hay nada
                        </div>
                        @endif
                    @endforeach
                  

                    {{-- <div x-show="tab === 1" class="text-sm max-h-80 overflow-auto scrollbar scrollbar-thumb-theme-yellow scrollbar-track-gray-100 scrollbar-theme">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita aliquam recusandae eos
                        doloribus ex hic quam voluptate, autem nisi debitis magni atque similique exercitationem
                        molestiae dolores dignissimos! Beatae, ipsam sed?
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita aliquam recusandae eos
                        doloribus ex hic quam voluptate, autem nisi debitis magni atque similique exercitationem
                        molestiae dolores dignissimos! Beatae, ipsam sed?
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita aliquam recusandae eos
                        doloribus ex hic quam voluptate, autem nisi debitis magni atque similique exercitationem
                        molestiae dolores dignissimos! Beatae, ipsam sed?
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita aliquam recusandae eos
                        doloribus ex hic quam voluptate, autem nisi debitis magni atque similique exercitationem
                        molestiae dolores dignissimos! Beatae, ipsam sed?
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita aliquam recusandae eos
                        doloribus ex hic quam voluptate, autem nisi debitis magni atque similique exercitationem
                        molestiae dolores dignissimos! Beatae, ipsam sed?
                    </div>
                     --}}
                    {{-- <div x-show="tab === 2" class="text-sm max-h-80 overflow-auto scrollbar scrollbar-thumb-theme-yellow scrollbar-track-gray-100 scrollbar-theme"> Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Repellendus obcaecati, reiciendis ipsum possimus pariatur enim, unde repellat delectus dolorum
                        ab hic optio deleniti tenetur ipsa, quaerat quisquam maxime dolorem provident? </div>
                    <div x-show="tab === 3" class="text-sm max-h-80 overflow-auto scrollbar scrollbar-thumb-theme-yellow scrollbar-track-gray-100 scrollbar-theme"> Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        Eaque, quam provident voluptatibus libero iure, dolores dolor delectus animi non nesciunt
                        perspiciatis ad pariatur maiores sunt. Ratione reiciendis velit labore minima! </div> --}}
                </div>
            </div>
        </div>
    </section>
    @endif

    @if ($sku_selected->videos->count())
    <section>
        <div class="max-w-[90%] lg:max-w-[50%] mx-auto pb-10">
            <div class="embed-responsive">
                {!! $sku_selected->videos->first()->iframe !!}
            </div>
        </div>
    </section>
    @endif


    <div x-data="{open: @entangle('openModalService')}" x-init="$watch('open', toggleOverflow)" @keydown.window.escape="open = false" class="relative z-10" aria-labelledby="modal-title" x-ref="dialog" aria-modal="true"  x-show="open" style="display: none">
        <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" 
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" 
        class="fixed inset-0 bg-black bg-opacity-75 transition-opacity"></div>
      
        <div class="fixed inset-0 z-10 overflow-y-auto">
          <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-description="Modal panel, show/hide based on modal state." class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg" @click.away="open = false">
                <div class="relative bg-white text-center p-8">
                    <button @click="open = false" class="absolute bg-theme-lwgray top-5 right-5 rounded-full p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div>
                        <div class="row justify-center items-center">
                            <svg class="w-12 h-12" viewBox="0 0 94 93" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="fill-theme-gray" d="M49.4376 92.9949H43.6259C43.3929 92.9439 43.1624 92.8638 42.9294 92.8444C35.1206 92.2378 27.9355 89.7966 21.3351 85.5768C4.93373 75.0939 -3.2609 54.9555 1.2089 36.0377C7.31422 10.1993 33.1187 -5.22418 58.7873 1.62611C76.0064 6.2221 89.4328 20.9661 92.3253 38.4789C92.6044 40.1751 92.7985 41.8858 93.0314 43.5893V49.401C92.9805 49.634 92.9004 49.8669 92.881 50.1023C92.0632 60.2916 88.3311 69.2797 81.624 76.9769C74.4146 85.2492 65.3633 90.3644 54.5407 92.2887C52.8518 92.5896 51.1386 92.7619 49.4376 92.9949ZM6.53771 46.4042C6.43579 68.4353 24.3368 86.4067 46.4626 86.4867C68.4718 86.5668 86.3729 68.7556 86.5209 46.6274C86.6689 24.6109 68.7946 6.62734 46.6397 6.50115C24.6232 6.3774 6.63963 24.2687 6.53771 46.4042Z" fill="#323232"/>
                                <path class="fill-theme-gray" d="M41.8167 53.2622C41.8167 49.5423 41.8458 45.8223 41.8021 42.1023C41.7851 40.7337 42.3796 39.831 43.5808 39.336C45.6046 38.5036 47.6551 38.5255 49.6522 39.4258C50.7635 39.9256 51.3144 40.7822 51.3095 42.0805C51.2756 49.5495 51.2804 57.021 51.3095 64.4901C51.3144 65.5894 50.8752 66.3707 49.9919 66.8973C47.7885 68.2101 45.5221 68.2611 43.2726 67.0283C42.2753 66.4824 41.7876 65.6258 41.8021 64.4222C41.8458 60.7022 41.8191 56.9822 41.8191 53.2622H41.8167Z" fill="#323232"/>
                                <path class="fill-theme-gray" d="M46.6109 33.1088C44.9535 33.0991 43.6189 32.5556 42.573 31.3811C41.151 29.7892 41.1705 27.6126 42.5997 26.0353C44.5628 23.8683 48.3192 23.8198 50.3163 25.9503C51.3937 27.1006 51.7893 28.4546 51.2481 29.9615C50.5929 31.7839 49.1831 32.723 47.3267 33.053C47.0598 33.1015 46.7856 33.0967 46.6085 33.1088H46.6109Z" fill="#323232"/>
                            </svg>
                          </div>
                          @if ($service_selected)
                            <h1 class="text-lg font-bold text-center border-b-2 border-theme-yellow inline-block uppercase mt-4">{{ $service_selected->name }}</h1>
                            <p class="text-sm mt-3">{{ $service_selected->description }}</p>
                          @else
                            <p class="text-sm mt-4"> Descripción no disponible.</p>
                          @endif
                        </div>
                    </div>
              </div>
          </div>
        </div>
      </div>

</div>
