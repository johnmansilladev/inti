<div x-data>
    <section>
        <div class="section-product-detail">
            <nav aria-label="Breadcrumb" class="container-breadcrumb">
                <ol role="list">
                    <li>
                        <div class="flex items-center">
                            <a href="{{ route('home') }}" class="mr-1 md:mr-4 text-sm font-semibold text-theme-gray capitalize">Home</a>
                            <svg viewBox="0 0 6 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-5 w-auto text-theme-gray">
                                <path d="M4.878 4.34H3.551L.27 16.532h1.327l3.281-12.19z" fill="currentColor" />
                            </svg>
                        </div>
                    </li>

                    <li>
                        <div class="flex items-center">
                            <a href="{{ route('shop',['shop_section' => 'category', 'shop_section_url' => $product->category->slug]) }}" class="mr-1 md:mr-4 text-sm font-semibold text-theme-gray capitalize">{{ Str::title($product->category->name) }}</a>
                            <svg viewBox="0 0 6 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-5 w-auto text-theme-gray">
                                <path d="M4.878 4.34H3.551L.27 16.532h1.327l3.281-12.19z" fill="currentColor" />
                            </svg>
                        </div>
                    </li>
                    <li class="text-sm">
                        <a href="#" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600 pointer-events-none">{{ Str::title($product->name) }}</a>
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
                            <img src="{{ Storage::url($image->url) }}" title="{{ $product->name }}" alt="{{ $product->name }}" class="w-full h-auto object-center object-cover">
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

                    <div aria-labelledby="details-heading" class="mt-6 w-full">
                        <h2 id="details-heading" class="sr-only">Additional details</h2>
                

                        @foreach ($specification_groups as $specification_group)
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
                                                {{ $specification_value}},
                                            @endforeach 
                                        </li>
                                        @endforeach
                                        {{-- 
                                        <li>
                                            <span class="font-semibold text-theme-gray">Tipo de Software:</span>Diagnóstico
                                        </li>
                                        <li>
                                            <span class="font-semibold text-theme-gray">Marca:</span> Honda
                                        </li>
                                        <li>
                                            <span class="font-semibold text-theme-gray">Interfaces:</span> HDS V3.103.004
                                        </li>
                                        <li>
                                            <span class="font-semibold text-theme-gray">Sistema Operativo:</span> Windows 10, 11, 7, 8
                                        </li>
                                        <li>
                                            <span class="font-semibold text-theme-gray">Idioma:</span> Inglés
                                        </li>
                                        <li>
                                            <span class="font-semibold text-theme-gray">Tamaño:</span> 2.75 GB
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        @if ($sku_selected->services->count())
                            @livewire('frontend.products.add-cart-item-service', ['product' => $product])
                        @else
                            {{-- @livewire('add-cart-item', ['product' => $product]) --}}
                            no hay nada
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container pt-2 pb-6 md:pb-12 md:pt-6">
            <div x-data="{ tab: 1 }">
                <ul class="grid grid-cols-3 gap-2 md:gap-20">
                    <li @click="tab = 1" class="py-2 text-xs md:text-base text-center flex items-center justify-center font-bold text-theme-gray rounded-lg hover:cursor-pointer" :class="tab == 1 ? 'bg-theme-yellow' : 'bg-theme-lwgray'">Información General</li>
                    <li @click="tab = 2" class="py-2 text-xs md:text-base text-center flex items-center justify-center font-bold text-theme-gray rounded-lg hover:cursor-pointer" :class="tab == 2 ? 'bg-theme-yellow' : 'bg-theme-lwgray'">Actualización</li>
                    <li @click="tab = 3" class="py-2 text-xs md:text-base text-center flex items-center justify-center font-bold text-theme-gray rounded-lg hover:cursor-pointer" :class="tab == 3 ? 'bg-theme-yellow' : 'bg-theme-lwgray'">Vehiculos Compatibles</li>
                </ul>
                <div class="mt-4 md:mt-8">
                    <div x-show="tab === 1" class="text-sm max-h-80 overflow-auto scrollbar scrollbar-thumb-theme-yellow scrollbar-track-gray-100 scrollbar-theme">
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
                    <div x-show="tab === 2" class="text-sm max-h-80 overflow-auto scrollbar scrollbar-thumb-theme-yellow scrollbar-track-gray-100 scrollbar-theme"> Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Repellendus obcaecati, reiciendis ipsum possimus pariatur enim, unde repellat delectus dolorum
                        ab hic optio deleniti tenetur ipsa, quaerat quisquam maxime dolorem provident? </div>
                    <div x-show="tab === 3" class="text-sm max-h-80 overflow-auto scrollbar scrollbar-thumb-theme-yellow scrollbar-track-gray-100 scrollbar-theme"> Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        Eaque, quam provident voluptatibus libero iure, dolores dolor delectus animi non nesciunt
                        perspiciatis ad pariatur maiores sunt. Ratione reiciendis velit labore minima! </div>
                </div>
            </div>
        </div>
    </section>
</div>
