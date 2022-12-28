<div x-data>
    <section>
        <div class="max-w-[70%] mx-auto py-14">
            <nav aria-label="Breadcrumb">
                <ol role="list" class="flex items-center space-x-4">
                    <li>
                        <div class="flex items-center">
                            <a href="/" class="mr-4 text-sm font-medium text-gray-900"> Home </a>
                            <svg viewBox="0 0 6 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                class="h-5 w-auto text-gray-300">
                                <path d="M4.878 4.34H3.551L.27 16.532h1.327l3.281-12.19z" fill="currentColor" />
                            </svg>
                        </div>
                    </li>

                    <li>
                        <div class="flex items-center">
                            <a href="{{ route('category.index', $product->category->slug) }}"
                                class="mr-4 text-sm font-medium text-gray-900">{{ Str::title($product->category->name) }}
                            </a>
                            <svg viewBox="0 0 6 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                class="h-5 w-auto text-gray-300">
                                <path d="M4.878 4.34H3.551L.27 16.532h1.327l3.281-12.19z" fill="currentColor" />
                            </svg>
                        </div>
                    </li>

                    <li class="text-sm">
                        <a href="{{ route('product.index', $product->slug) }}" aria-current="page"
                            class="font-medium text-gray-500 hover:text-gray-600 pointer-events-none">{{ Str::title($product->name) }}</a>
                    </li>
                </ol>
            </nav>
            <div class="py-4">
                <div class="flex">
                    <!-- Image gallery -->
                    <div x-data="{img_selected: @entangle('img_selected')}"
                    class="w-3/5 px-4 py-10 flex flex-wrap border-r border-gray-200">
                        <!-- Image selector -->
                        <div class="w-1/6 h-[550px] overflow-y-auto scrollbar scrollbar-thumb-theme-yellow scrollbar-track-gray-100 scrollbar-theme">
                            <div class="grid grid-rows-4 gap-2" aria-orientation="horizontal" role="tablist">
                                @foreach ($sku_selected->images as $key => $image)
                                    <button wire:click="updateImgSelected({{ $image->id }})" id="tabs-{{ $key }}-tab-{{ $key }}"
                                        class="relative bg-white min-h-80 aspect-w-1 aspect-h-1 rounded-md flex items-center justify-center text-sm font-medium uppercase text-gray-900 cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring focus:ring-offset-4 focus:ring-opacity-50 px-[7px]"
                                        aria-controls="tabs-{{ $key }}-panel-{{ $key }}"
                                        role="tab" type="button">
                                        <span class="rounded-md overflow-hidden">
                                            <img src="{{ Storage::url($image->url) }}" alt="" class="w-full">
                                        </span>
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        <div class="w-4/6 mx-auto">
                            <div id="tabs-1-panel-1" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                                <img :src="img_selected"
                                    class="w-full h-full object-center object-cover sm:rounded-lg">
                            </div>
                        </div>
                    </div>
                    <!-- Product info -->
                    <div class="w-2/5 pl-16">
                        <h1 class="text-2xl font-extrabold uppercase text-theme-gray">{{ $sku_selected->name }}</h1>

                        <div class="flex justify-between items-center mt-3">
                            <div class="text-sm font-bold text-theme-gray uppercase">
                                <a href="">{{ $product->brand->name }}</a>
                            </div>
                            <div class="flex items-center">
                                <ul class="flex items-center space-x-1 text-xs mb-1 mr-2">
                                    <li>
                                        <i
                                            class='bx bxs-star text-xl text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange'></i>
                                    </li>
                                    <li>
                                        <i
                                            class='bx bxs-star text-xl text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange'></i>
                                    </li>
                                    <li>
                                        <i
                                            class='bx bxs-star text-xl text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange'></i>
                                    </li>
                                    <li>
                                        <i
                                            class='bx bxs-star text-xl text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange'></i>
                                    </li>
                                    <li>
                                        <i
                                            class='bx bxs-star text-xl text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange'></i>
                                    </li>
                                </ul>
                                <p
                                    class="text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-theme-yellow to-theme-orange">
                                    5.0</p>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h3 class="sr-only">Description</h3>

                            <div class="text-justify text-sm text-gray-700 space-y-6">
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>

                        <div aria-labelledby="details-heading" class="mt-6">
                            <h2 id="details-heading" class="sr-only">Additional details</h2>

                            <div class="bg-theme-lwgray rounded-lg p-6">
                                <div x-data="{ open: true }">
                                    <h3>
                                        <button type="button"
                                            class="group relative w-full flex justify-between items-center text-left"
                                            :class="open ? 'pb-2' : ''" aria-controls="disclosure-1"
                                            @click="open = !open" x-bind:aria-expanded="open">
                                            <span class="text-theme-gray text-sm font-semibold"> Características
                                                destacadas</span>
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
                                            <li><span class="font-semibold text-theme-gray">Etiquetas:</span> Automotor
                                            </li>

                                            <li><span class="font-semibold text-theme-gray">Tipo de Software:</span>
                                                Diagnóstico</li>

                                            <li><span class="font-semibold text-theme-gray">Marca:</span> Honda</li>

                                            <li><span class="font-semibold text-theme-gray">Interfaces:</span> HDS
                                                V3.103.004</li>

                                            <li><span class="font-semibold text-theme-gray">Sistema Operativo:</span>
                                                Windows 10, 11, 7, 8</li>

                                            <li><span class="font-semibold text-theme-gray">Idioma:</span> Inglés</li>

                                            <li><span class="font-semibold text-theme-gray">Tamaño:</span> 2.75 GB</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            @if ($sku_selected->services->count())
                                @livewire('add-cart-item-service', ['product' => $product])
                            @else
                                @livewire('add-cart-item', ['product' => $product])
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="max-w-[80%] mx-auto pb-12 pt-6">
            <div x-data="{ tab: 1 }">
                <ul class="grid grid-cols-3 gap-20">
                    <li @click="tab = 1"
                        class="py-2 text-base text-center font-bold text-theme-gray rounded-lg hover:cursor-pointer"
                        :class="tab == 1 ? 'bg-theme-yellow' : 'bg-theme-lwgray'">Información General</li>
                    <li @click="tab = 2"
                        class="py-2 text-base text-center font-bold text-theme-gray rounded-lg hover:cursor-pointer"
                        :class="tab == 2 ? 'bg-theme-yellow' : 'bg-theme-lwgray'">Actualización</li>
                    <li @click="tab = 3"
                        class="py-2 text-base text-center font-bold text-theme-gray rounded-lg hover:cursor-pointer"
                        :class="tab == 3 ? 'bg-theme-yellow' : 'bg-theme-lwgray'">Vehiculos Compatibles</li>
                </ul>
                <div class="mt-8">
                    <div x-show="tab === 1" class="text-sm">
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
                    <div x-show="tab === 2" class="text-sm"> Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Repellendus obcaecati, reiciendis ipsum possimus pariatur enim, unde repellat delectus dolorum
                        ab hic optio deleniti tenetur ipsa, quaerat quisquam maxime dolorem provident? </div>
                    <div x-show="tab === 3" class="text-sm"> Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        Eaque, quam provident voluptatibus libero iure, dolores dolor delectus animi non nesciunt
                        perspiciatis ad pariatur maiores sunt. Ratione reiciendis velit labore minima! </div>
                </div>
            </div>
        </div>
    </section>
</div>
