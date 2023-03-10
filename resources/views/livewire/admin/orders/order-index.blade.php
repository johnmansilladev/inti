<section>
    <div class="max-w-[95%] mx-auto my-8 bg-white rounded-md shadow-lg">
        <div class="p-8">
            <div class="row flex-col">
                <div class="sm:flex-auto">
                    <h1 class="text-2xl font-semibold text-gray-900">{{ __('Órdenes') }}</h1>
                    {{-- <p class="mt-2 text-sm text-gray-700">{{ $orders->total() .' '. __('ordenes encontradas') }} </p> --}}
                </div>
                <div class="flex justify-between items-center mt-2">
                    <div class="w-1/4">
                        <label for="search" class="form-label">{{ __('Buscar') }} :</label>
                        <div class="mt-1 relative">
                            <input type="search" id="search" wire:model="search" class="form-control pl-10" placeholder="Buscar">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg> 
                            </div>
                        </div>
                    </div>
                    <div class="row space-x-2">
                        <div>
                            <label for="date_from" class="form-label">{{ __('Desde') }} :</label>
                            <div class="mt-1 relative">
                                <input type="date" id="date_from" wire:model.defer="date_from" class="form-control pl-10">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                    </svg>  
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="date_to" class="form-label">{{ __('Hasta') }} :</label>
                            <div class="mt-1 relative">
                                <input type="date" id="date_to" wire:model.defer="date_to" class="form-control pl-10">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                    </svg>  
                                </div>
                            </div>
                        </div> 
                        <div>
                            <label for="status" class="form-label">{{ __('Estado') }}</label>
                            <select wire:model.defer="status" id="status" class="form-control">
                              <option value="" selected>Todos</option>
                              <option value="pending">Pendiente</option>
                              <option value="paid">Pagado</option>
                              <option value="cancelled">Cancelado</option>
                            </select>
                        </div>
                        <div class="flex items-end">
                            <button type="button" wire:click="applyFiltersBtn" wire:loading.attr="disabled" wire:target="applyFiltersBtn" class="w-full flex justify-center items-center rounded-md border border-transparent bg-theme-lyellow py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-theme-yellow focus:outline-none focus:ring-2 focus:ring-transparent focus:ring-offset-2 focus:ring-offset-gray-50 uppercase disabled:opacity-75">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                                </svg>
                                  
                                {{ __('filtrar') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-black">
                            <tr>
                                <th scope="col" class="py-4 px-3 text-center text-sm font-semibold text-white capitalize cursor-pointer" wire:click="sortBy('nro_order')">
                                    {{ __('Nro orden') }}
                                    <span class="inline-flex float-right text-sm">
                                        <i class="bx {{ $sortField == 'nro_order' && $sortDirection == 'asc' ? 'bx-sort-z-a' : 'hidden' }}"></i>
                                        <i class="bx {{ $sortField == 'nro_order' && $sortDirection == 'desc' ? 'bx-sort-a-z' : 'hidden' }}"></i>
                                    </span>
                                </th>
                                <th scope="col" class="py-4 px-3 text-center text-sm font-semibold text-white capitalize cursor-pointer" wire:click="sortBy('created_at')">
                                    {{ __('Fecha') }}
                                    <span class="inline-flex float-right text-sm">
                                        <i class="bx {{ $sortField == 'created_at' && $sortDirection == 'asc' ? 'bx-sort-z-a' : 'hidden' }}"></i> 
                                        <i class="bx {{ $sortField == 'created_at' && $sortDirection == 'desc' ? 'bx-sort-a-z' : 'hidden' }}"></i>                                                                               
                                    </span>
                                </th>
                                <th scope="col" class="py-4 px-3 text-center text-sm font-semibold text-white capitalize cursor-pointer" wire:click="sortBy('email')">
                                    {{ __('Email') }}
                                    <span class="inline-flex float-right text-sm">
                                        <i class="bx {{ $sortField == 'email' && $sortDirection == 'asc' ? 'bx-sort-z-a' : 'hidden' }}"></i>   
                                        <i class="bx {{ $sortField == 'email' && $sortDirection == 'desc' ? 'bx-sort-a-z' : 'hidden' }}"></i>                                                                                                                                                          
                                    </span>
                                </th>
                                <th scope="col" class="py-4 px-3 text-center text-sm font-semibold text-white capitalize cursor-pointer" wire:click="sortBy('contact_medium')">
                                    {{ __('Medio contacto') }}
                                    <span class="inline-flex float-right text-sm">
                                        <i class="bx {{ $sortField == 'contact_medium' && $sortDirection == 'asc' ? 'bx-sort-z-a' : 'hidden' }}"></i>  
                                        <i class="bx {{ $sortField == 'contact_medium' && $sortDirection == 'desc' ? 'bx-sort-a-z' : 'hidden' }}"></i>                                                                             
                                    </span>
                                </th>
                                <th scope="col" class="py-4 px-3 text-center text-sm font-semibold text-white capitalize">
                                    {{ __('Total') }}
                                    {{-- <span class="inline-flex float-right text-sm">
                                        <i class="bx {{ $sortField == 'total' && $sortDirection == 'asc' ? 'bx-sort-z-a' : 'bx-sort-a-z' }}"></i>                                                                               
                                    </span> --}}
                                </th>
                                <th scope="col" class="py-4 px-3 text-center text-sm font-semibold text-white capitalize cursor-pointer" wire:click="sortBy('status')">
                                    {{ __('Estado') }}
                                    <span class="inline-flex float-right text-sm">
                                        <i class="bx {{ $sortField == 'status' && $sortDirection == 'asc' ? 'bx-sort-z-a' : 'hidden' }}"></i> 
                                        <i class="bx {{ $sortField == 'status' && $sortDirection == 'desc' ? 'bx-sort-a-z' : 'hidden' }}"></i>                                                                               
                                    </span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($orders as $key => $order)
                                <tr class="hover:bg-gray-100" wire:loading.class="opacity-50">
                                    <td class="whitespace-nowrap text-center py-4 px-3 text-sm text-black">
                                        <a href="{{ route('admin.orders.edit',$order) }}" class="hover:underline hover:text-theme-yellow">{{ $order->nro_order }}</a>
                                    </td>
                                    <td class="whitespace-nowrap text-center py-4 px-3 text-sm text-gray-500">{{ $order->created_at->format('d/m/Y h:i:s a') }}</td>
                                    <td class="whitespace-nowrap text-center py-4 px-3 text-sm text-gray-500">{{ $order->email }}</td>
                                    <td class="whitespace-nowrap text-center py-4 px-3 text-sm text-gray-500 capitalize">
                                        @switch($order->contact_medium)
                                            @case(App\Models\Order::WHATSAPP)
                                                <a href="https://api.whatsapp.com/send?phone={{ str_replace('+','',$order->contact_information) }}" class="hover:underline" target="_blank">{{ $order->contact_medium .' '. $order->contact_information }}</a>
                                                @break
                                            @case(App\Models\Order::TELEGRAM)
                                                <a href="https://t.me/{{ $order->contact_information }}" class="hover:underline" target="_blank">{{ $order->contact_medium .' '. $order->contact_information }}</a>
                                                @break
                                            @default
                                                {{ $order->contact_medium .' '. $order->contact_information }}
                                        @endswitch
                                    </td>
                                    <td class="whitespace-nowrap text-center py-4 px-3 text-sm text-gray-500">S/. {{ $order->total }}</td>
                                    <td class="whitespace-nowrap text-center py-4 px-4 text-sm text-gray-500">
                                        @switch($order->status)
                                            @case(App\Models\Order::PENDING)
                                                <span class="inline-flex rounded-full bg-yellow-200 px-2 text-xs font-semibold leading-5 text-yellow-800 capitalize">{{ __($order->status) }}</span>
                                                @break
                                            @case(App\Models\Order::PAID)
                                                <span class="inline-flex rounded-full bg-green-200 px-2 text-xs font-semibold leading-5 text-green-800 capitalize">{{ __($order->status) }}</span>
                                                @break
                                            @case(App\Models\Order::CANCELLED)
                                                <span class="inline-flex rounded-full bg-red-200 px-2 text-xs font-semibold leading-5 text-red-800 capitalize">{{ __($order->status) }}</span>
                                                @break
                                            @default
                                                
                                        @endswitch
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="flex justify-center items-center">
                                            <span class="font-medium py-4 text-theme-gray text-sm">{{ __('No se ha encontrado ninguna orden ') }}</span>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                
                            <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
