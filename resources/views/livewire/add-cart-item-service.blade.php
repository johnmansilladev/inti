<div x-data>
    <div class="flex flex-col mt-6">
        <div class="flex justify-between items-center">
            <p class="text-sm font-medium text-theme-gray">Normal</p>
            <p class="text-sm font-medium text-theme-gray line-through">
                {{ $service_selected->pivot->currency_type_id }}
                {{ $service_selected->pivot->base_price }}
            </p>
        </div>
        <div class="flex justify-between items-center pt-1">
            <p class="text-sm font-semibold text-red-500">Oferta</p>
            <p class="text-sm font-semibold text-red-500">S/. 89.90</p>
        </div>
    </div>

    <div class="mt-6">
        <div class="grid grid-cols-3 gap-x-8 gap-y-4">
            <div x-data="{ open: false }" class="relative col-span-3">
                <button @click="open = !open" type="button"
                    class="bg-white relative w-full border border-theme-lgray rounded-md shadow-sm pl-3 pr-10 py-2.5 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-transparent sm:text-sm"
                    aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                    <span class="block truncate uppercase">{{ $sku_selected->name }}</span>
                    <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </span>
                </button>
                <ul x-show="open"
                    class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm"
                    tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-3"
                    @click.outside="open = false" :hidden="!open">
        
                    @foreach ($product->stockKeepingUnits as $sku)
                        <li class="text-theme-gray cursor-default select-none relative py-2 px-6 border-l-4 border-l-transparent hover:border-l-4 hover:border-l-theme-orange hover:bg-theme-lwgray hover:cursor-pointer"
                            id="listbox-option-0" @click.outside="open = false" role="option"
                            wire:click="updateSkuSelected({{ $sku->id }})">
                            <span class="font-normal block uppercase">{{ $sku->name }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div x-data="{ open: false }" class="relative col-span-3">
                <button @click="open = !open" type="button"
                    class="bg-white relative w-full border border-theme-lgray rounded-md shadow-sm pl-3 pr-10 py-2.5 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-transparent sm:text-sm"
                    aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                    <span class="block truncate uppercase">{{ $service_selected->name }}</span>
                    <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                        <!-- Heroicon name: solid/selector -->
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </span>
                </button>
                <ul x-show="open"
                    class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm"
                    tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-3"
                    @click.outside="open = false" :hidden="!open">
        
                    @foreach ($sku_selected->services as $service)
                        <li class="text-theme-gray cursor-default select-none relative py-2 px-6 border-l-4 border-l-transparent hover:border-l-4 hover:border-l-theme-orange hover:bg-theme-lwgray hover:cursor-pointer"
                            id="listbox-option-0" @click="open = false" role="option"
                            wire:click="updateServiceSelected({{ $service->id }})">
                            <span class="font-normal block uppercase">{{ $service->name }}</span>
                            <span class="text-indigo-600 absolute inset-y-0 right-0 flex items-center pr-4">
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="custom-number-input">
                <div class="flex flex-row w-full rounded-lg relative bg-transparent">
                    <button type="button" disabled x-bind:disabled="$wire.qty <= 1" wire:loading.attr="disabled"
                        wire:target="decrement" wire:click="decrement"
                        class="bg-theme-orange text-white h-min-full px-2 rounded cursor-pointer outline-none">
                        <span class="m-auto text-2xl font-semibold">−</span>
                    </button>
                    <input type="number"
                        class="text-center w-full bg-white font-semibold text-md border-transparent flex items-center text-theme-gray focus:outline-none focus:ring-1 focus:ring-transparent"
                        name="custom-input-number" wire:model="qty"></input>
                    <button type="button" wire:loading.attr="disabled" wire:target="increment" wire:click="increment"
                        class="bg-theme-orange text-white h-min-full px-2 rounded cursor-pointer outline-none">
                        <span class="m-auto text-2xl font-semibold">+</span>
                    </button>
                </div>
            </div>
            <button type="button" wire:click="addItem"
                class="col-span-2 flex items-center justify-center w-full py-2.5 border border-transparent text-sm font-semibold rounded-md text-white uppercase bg-theme-gray">Agregar
                al carrito</button>
        </div>
    </div>
</div>


