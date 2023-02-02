<x-app-layout>
    @section('title') {{ 'Orden - '.  $order->nro_order }} @endsection
    <section>
        
        <div class="max-w-[90%] md:max-w-[60%] mx-auto my-4 md:my-12 space-y-4 md:space-y-8">
            @if(session('message'))
            <div class="rounded-md bg-green-50 p-4 my-8">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm leading-5 font-medium text-green-800">
                            {{ session('message') }}
                        </p>
                    </div>
                </div>
            </div>
            @endif
            <div class="row justify-between w-full bg-white shadow-[0_4px_6px_4px_rgba(0,0,0,0.1),0_2px_4px_-2px_rgb(0,0,0,0.1)] h-fit rounded-lg px-4 py-3 md:px-8 md:py-6">
                <p class="text-sm text-theme-gray uppercase leading-normal"><span class="font-bold">{{__('Nro de orden')}}:</span> {{ $order->nro_order }}</p>
                <p  class="text-sm text-theme-gray uppercase leading-normal"><span class="font-bold">{{__('Fecha')}}:</span> {{ $order->created_at }}</p>
            </div>
            <div class="w-full bg-white shadow-[0_4px_6px_4px_rgba(0,0,0,0.1),0_2px_4px_-2px_rgb(0,0,0,0.1)] h-fit rounded-lg px-4 py-3 md:px-8 md:py-6">
                <div class="flex border-b pb-1">
                    <h1 class="font-bold text-sm md:text-base text-theme-gray uppercase">{{__('Datos del contacto')}}:</h1>
                </div>
                <div class="grid grid-cols-2 gap-2 md:gap-6 pt-4">
                    <div class="col-span-2 md:col-span-1 space-y-1">
                        <p class="text-sm text-theme-gray uppercase leading-normal"><span class="font-bold">{{__('Nombres y apellidos')}}:</span> {{ $order->contact_name}}</p>
                        <p class="text-sm text-theme-gray uppercase leading-normal"><span class="font-bold">{{__('Email')}}:</span> {{ $order->email}}</p>
                    </div>
                    <div class="col-span-2 md:col-span-1 space-y-1">
                        <p class="text-sm text-theme-gray uppercase leading-normal"><span class="font-bold">{{__('Medio de contacto')}}:</span> {{ $order->contact_medium}}</p>
                        <p class="text-sm text-theme-gray uppercase leading-normal"><span class="font-bold">{{__('Información de contacto')}}:</span> {{ $order->contact_information}}</p>
                    </div>
                    
                </div>
            </div>
            <div class="w-full bg-white shadow-[0_4px_6px_4px_rgba(0,0,0,0.1),0_2px_4px_-2px_rgb(0,0,0,0.1)] h-fit rounded-lg px-8 py-6">
                <div class="flex border-b pb-1">
                    <h1 class="font-bold text-sm md:text-base text-theme-gray uppercase">{{__('Detalle de orden')}}:</h1>
                </div>
                <div class="hidden md:flex my-4">
                    <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Producto</h3>
                    <h3 class="font-semibold text-center text-theme-gray text-xs uppercase w-1/5">Cantidad</h3>
                    <h3 class="font-semibold text-center text-theme-gray text-xs uppercase w-1/5">Precio</h3>
                    <h3 class="font-semibold text-center text-theme-gray text-xs uppercase w-1/5">Total</h3>
                </div>
                @foreach ($order->orderDetails as $item)
                <div class="row items-center hover:bg-gray-100 group md:-mx-8 md:px-6 py-3 md:py-5  {{ !$loop->last ? 'border-b' : '' }}">
                    <div class="flex w-full md:w-2/5 mb-2 md:mb-0">
                        <!-- product -->
                        <div class="w-24">
                            <a href="{{ route('product.index',['product'=>$item->stockKeepingUnit->product->slug,'version'=>$item->stockKeepingUnit->slug]) }}" class="relative">
                                <img class="h-auto" src="{{ Storage::url($item->stockKeepingUnit->images->first()->url) }}" alt="{{ $item->product_name }}">
                                @if ($item->dcto > 0)
                                    <div class="absolute top-2 left-2">
                                        <div class="flex justify-center items-center bg-[#FF0000] rounded-lg drop-shadow-3xl px-2">
                                            <span class="text-[10px] font-bold text-white">-{{ number_format($item->dcto) }}%</span>
                                        </div>
                                    </div>
                                @endif
                            </a>
                        </div>
                        <div class="flex flex-col ml-4 flex-grow">
                            <a href="{{ route('product.index',['product'=>$item->stockKeepingUnit->product->slug,'version'=>$item->stockKeepingUnit->slug,'service'=>$item->service->slug]) }}" class="font-bold text-xs uppercase">{{ $item->product_name }}</a>
                            <span class="text-theme-gray font-bold text-xs capitalize  mt-1 md:mt-2">{{ $item->stockKeepingUnit->product->brand->name}}</span>
                            <div class="w-fit flex bg-theme-lwgray group-hover:bg-theme-yellow rounded-md py-1 md:py-2 px-3 mt-1 md:mt-2">
                                <a href="{{ route('product.index',['product'=>$item->stockKeepingUnit->product->slug,'version'=>$item->stockKeepingUnit->slug,'service'=>$item->service->slug]) }}" class="text-xs font-semibold uppercase truncate">
                                    {{ $item->service->name }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center w-2/6 md:w-1/5">
                        <span class="text-center text-theme-gray font-medium text-sm">{{ $item->qty }}</span>
                    </div>
                    <div class="flex flex-col justify-center items-center w-2/6	md:w-1/5">
                        @if ($item->dcto > 0 || $item->price_sale < $item->price_base)
                            <div class="flex text-center font-medium text-sm">S/. {{ number_format($item->price_sale,2) }}</div>
                            <div class="flex text-center font-medium text-sm line-through">S/. {{  number_format($item->price_base,2) }}</div>
                        @else
                            <div class="flex text-center font-medium text-sm">S/. {{ number_format($item->price_sale,2) }}</div>
                        @endif
                        
                    </div>
                    
                    <span class="text-center w-2/6 md:w-1/5 font-medium text-sm">S/. {{ number_format($item->price_sale,2) }}</span>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
</x-app-layout>