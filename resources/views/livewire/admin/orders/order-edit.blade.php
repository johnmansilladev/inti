<div class="max-w-[95%] mx-auto my-8">
  <div class="mx-auto my-8 grid w-full grid-cols-1 gap-6 sm:px-6 lg:grid-flow-col-dense lg:grid-cols-3">
    <div class="space-y-6 lg:col-span-2 lg:col-start-1">
      <!-- Datos del cliente -->
      <section aria-labelledby="customer-detail">
        <div class="bg-white shadow sm:rounded-lg">
            <div class="row justify-between items-center px-4 py-4 sm:px-6">
              <h2 id="customer-detail" class="text-lg font-medium leading-6 text-gray-900 capitalize">{{ __('datos del cliente') }}</h2>
              <p class="mt-1 max-w-2xl text-base text-gray-500">{{ __('Orden') }} #<span class="text-theme-yellow font-semibold">{{ $order->nro_order }}</span></p>
            </div>
            <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
              <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                <div class="sm:col-span-1">
                  <dt class="text-sm font-medium text-gray-500">{{ __('Nombres') }}</dt>
                  <dd class="mt-1 text-sm text-gray-900">{{ $order->contact_name }}</dd>
                </div>
                <div class="sm:col-span-1">
                  <dt class="text-sm font-medium text-gray-500">{{ __('Email') }}</dt>
                  <dd class="mt-1 text-sm text-gray-900"><a href="mailto:{{ $order->email }}" class="hover:underline" target="_blank">{{ $order->email }}</a></dd>
                </div>
                <div class="sm:col-span-1">
                  <dt class="text-sm font-medium text-gray-500">{{ __('Medio de contacto') }}</dt>
                  <dd class="mt-1 text-sm text-gray-900 capitalize">{{ $order->contact_medium }}</dd>
                </div>
                <div class="sm:col-span-1">
                  <dt class="text-sm font-medium text-gray-500">{{ __('Información de contacto') }}</dt>

                  @switch($order->contact_medium)
                      @case(App\Models\Order::WHATSAPP)
                        <dd class="mt-1 text-sm text-gray-900"><a href="https://api.whatsapp.com/send?phone={{ str_replace('+','',$order->contact_information) }}" class="hover:underline" target="_blank">{{ $order->contact_information }}</a></dd>
                        @break
                      @case(App\Models\Order::TELEGRAM)
                        <dd class="mt-1 text-sm text-gray-900"><a href="https://t.me/{{ $order->contact_information }}" class="hover:underline" target="_blank">{{ $order->contact_information }}</a></dd>
                        @break
                      @default
                        <dd class="mt-1 text-sm text-gray-900">{{ $order->contact_information }}</dd> 
                  @endswitch

                </div>
              </dl>
            </div>
          </div>
      </section>

      <!-- Detalle de orden -->
      <section aria-labelledby="detail-items">
        <div class="bg-white shadow sm:rounded-lg">
          <div class="row justify-between items-center px-4 py-4 sm:px-6">
            <h2 id="detail-items" class="text-lg font-medium leading-6 text-gray-900">{{ __('Detalle de orden') }}</h2>
            <p class="mt-1 max-w-2xl text-base text-gray-500"> {{ __('Articulo(s)') .' '. $order->orderDetails->count() }}</p>
          </div>
          <div class="border-t border-gray-200 px-4 py-2 sm:px-6">
            <div class="hidden md:flex my-4">
                <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Producto</h3>
                <h3 class="font-semibold text-center text-theme-gray text-xs uppercase w-1/5">Cantidad</h3>
                <h3 class="font-semibold text-center text-theme-gray text-xs uppercase w-1/5">Precio</h3>
                <h3 class="font-semibold text-right text-theme-gray text-xs uppercase w-1/5">Subtotal</h3>
            </div>
            @foreach ($order->orderDetails as $item)
            <div class="row items-center hover:bg-gray-100 group px-2 py-2 md:py-4  {{ !$loop->last ? 'border-b' : '' }}">
                <div class="flex w-full md:w-2/5 mb-2 md:mb-0">
                    <!-- product -->
                    <div class="">
                        <a href="{{ route('product.index',['product'=>$item->stockKeepingUnit->product->slug,'version'=>$item->stockKeepingUnit->slug]) }}" class="relative">
                            <img class="max-w-[90px] h-auto" src="{{ Storage::url($item->stockKeepingUnit->images->first()->url) }}" alt="{{ $item->product_name }}">
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
                        <div class="flex text-right font-medium text-sm">S/. {{ number_format($item->price_sale,2) }}</div>
                        <div class="flex text-right font-medium text-sm line-through">S/. {{  number_format($item->price_base,2) }}</div>
                    @else
                        <div class="flex text-right font-medium text-sm">S/. {{ number_format($item->price_sale,2) }}</div>
                    @endif
                    
                </div>
                
                <span class="text-right w-2/6 md:w-1/5 font-medium text-sm">S/. {{ number_format($item->price_sale,2) }}</span>
            </div>
            @endforeach
            <div aria-labelledby="summary-detail-order">
              <div class="border-t py-3 lg:grid lg:grid-cols-12 lg:gap-x-8 lg:py-6">
                <dl class="grid grid-cols-2 gap-6 text-sm sm:grid-cols-2 md:gap-x-8 lg:col-span-7">
                  <div>
                    {{-- <dt class="font-medium text-gray-900">Billing address</dt>
                    <dd class="mt-3 text-gray-500">
                      <span class="block">Floyd Miles</span>
                      <span class="block">7363 Cynthia Pass</span>
                      <span class="block">Toronto, ON N3Y 4H8</span>
                    </dd> --}}
                  </div>
                  <div>
                    {{-- <dt class="font-medium text-gray-900">Payment information</dt>
                    <dd class="-ml-4 -mt-1 flex flex-wrap">
                      <div class="ml-4 mt-4 flex-shrink-0">
                        <svg aria-hidden="true" width="36" height="24" viewBox="0 0 36 24" xmlns="http://www.w3.org/2000/svg" class="h-6 w-auto">
                          <rect width="36" height="24" rx="4" fill="#224DBA"></rect>
                          <path d="M10.925 15.673H8.874l-1.538-6c-.073-.276-.228-.52-.456-.635A6.575 6.575 0 005 8.403v-.231h3.304c.456 0 .798.347.855.75l.798 4.328 2.05-5.078h1.994l-3.076 7.5zm4.216 0h-1.937L14.8 8.172h1.937l-1.595 7.5zm4.101-5.422c.057-.404.399-.635.798-.635a3.54 3.54 0 011.88.346l.342-1.615A4.808 4.808 0 0020.496 8c-1.88 0-3.248 1.039-3.248 2.481 0 1.097.969 1.673 1.653 2.02.74.346 1.025.577.968.923 0 .519-.57.75-1.139.75a4.795 4.795 0 01-1.994-.462l-.342 1.616a5.48 5.48 0 002.108.404c2.108.057 3.418-.981 3.418-2.539 0-1.962-2.678-2.077-2.678-2.942zm9.457 5.422L27.16 8.172h-1.652a.858.858 0 00-.798.577l-2.848 6.924h1.994l.398-1.096h2.45l.228 1.096h1.766zm-2.905-5.482l.57 2.827h-1.596l1.026-2.827z" fill="#fff"></path>
                        </svg>
                        <p class="sr-only">Visa</p>
                      </div>
                      <div class="ml-4 mt-4">
                        <p class="text-gray-900">Ending with 4242</p>
                        <p class="text-gray-600">Expires 02 / 24</p>
                      </div>
                    </dd> --}}
                  </div>
                </dl>
      
                <dl class="mt-8 divide-y divide-gray-200 text-sm lg:col-span-5 lg:mt-0">
                  <div class="flex items-center justify-between pb-4">
                    <dt class="text-xs text-gray-600 uppercase">Subtotal</dt>
                    <dd class="font-medium text-gray-900">S/. {{ number_format($order->total,2) }}</dd>
                  </div>
                  <div class="flex items-center justify-between pt-4">
                    <dt class="text-xs font-semibold text-black uppercase">{{ __('Total') }}</dt>
                    <dd class="font-medium text-theme-yellow">S/. {{ number_format($order->total,2) }}</dd>
                  </div>
                </dl>
              </div>
            </div>
        </div>
          
        </div>
      </section>
    </div>
    <div class="space-y-6 lg:col-span-1 lg:col-start-3">
      <section aria-labelledby="history-status">
        <div class="bg-white shadow sm:rounded-lg">
          <div class="row justify-between items-center px-4 py-4 sm:px-6">
            <h2 id="customer-detail" class="text-lg font-medium leading-6 text-gray-900 capitalize">{{ __('Historial') }}</h2>
          </div>
          <!-- Activity Feed -->
          <div class="border-t border-gray-200 px-4 py-4 sm:px-6">
            <ul role="list" class="-mb-8">
              @foreach ($order->historyOrders as $historyOrder)
                  <li>
                    <div class="relative pb-8">
                      @if (!$loop->last)
                        <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                      @endif
                      <div class="relative flex space-x-3">
                        <div>
                          <span class="h-8 w-8 rounded-full {{ $historyOrder->new_status == 'pending' ? 'bg-theme-yellow' : ($historyOrder->new_status == 'paid' ? 'bg-green-500' : 'bg-red-500') }} flex items-center justify-center ring-8 ring-white">
                              <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                              </svg>
                          </span>
                        </div>
                        <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                          <div>
                            <p class="text-sm text-theme-gray font-semibold capitalize">{{ __($historyOrder->new_status) }}</p>
                          </div>
                          <div class="whitespace-nowrap text-right text-sm text-gray-500">
                            <time datetime="{{ $order->created_at }}">{{ $order->created_at }}</time>
                            @if(!$loop->first)
                              <p>{{ Auth::user()->firstname.' '.Auth::user()->lastname }}</p>
                            @else
                              <p>{{ __('Registro automático') }}</p>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
              @endforeach
            </ul>
          </div>
         
          <div class="justify-stretch flex flex-col px-4 py-4 sm:px-6">
            @if ($order->status == App\Models\Order::PENDING)
              <button type="button" wire:click="advanceState"  wire:loading.attr="disabled" wire:target="advanceState" class="inline-flex items-center justify-center rounded-md border border-transparent bg-black opacity-75 hover:opacity-100 px-4 py-2 text-sm font-medium text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-transparent focus:ring-offset-2 disabled:opacity-50  uppercase">
                <svg wire:loading wire:target="advanceState" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span wire:loading.remove  wire:target="advanceState">{{  __('Siguiente estado') }}</span>
                <span wire:loading  wire:target="advanceState">{{  __('Guardando...') }}</span>
              </button>
            @endif
            @if ($order->status != App\Models\Order::CANCELLED)
              <button type="button" wire:click="cancelledOrder"  wire:loading.attr="disabled"  wire:target="cancelledOrder" class="inline-flex items-center mt-2 justify-center rounded-md border border-transparent bg-red-400 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-transparent focus:ring-offset-2 disabled:opacity-50  uppercase">
                <svg wire:loading wire:target="cancelledOrder" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span wire:loading.remove wire:target="cancelledOrder">{{  __('Cancelar orden') }}</span>
                <span wire:loading  wire:target="cancelledOrder">{{  __('Cancelando...') }}</span>
              </button> 
            @endif
          </div>
        </div>
      </section>
      <section aria-labelledby="history-status">
        <div class="bg-white shadow sm:rounded-lg">
          <div class="row px-4 py-4 sm:px-6">
            <h2 id="customer-detail" class="text-lg font-medium leading-6 text-gray-900 capitalize">{{ __('Datos de pago') }}</h2>
          </div>
          @if ($order->status != App\Models\Order::PENDING)
            <div class="border-t border-gray-200 px-4 py-4 sm:px-6">
              <div class="row">
                {{-- <div class="w-[10%]">
                  <svg aria-hidden="true" width="36" height="24" viewBox="0 0 36 24" xmlns="http://www.w3.org/2000/svg" class="h-6 w-auto">
                    <rect width="36" height="24" rx="4" fill="#224DBA"></rect>
                    <path d="M10.925 15.673H8.874l-1.538-6c-.073-.276-.228-.52-.456-.635A6.575 6.575 0 005 8.403v-.231h3.304c.456 0 .798.347.855.75l.798 4.328 2.05-5.078h1.994l-3.076 7.5zm4.216 0h-1.937L14.8 8.172h1.937l-1.595 7.5zm4.101-5.422c.057-.404.399-.635.798-.635a3.54 3.54 0 011.88.346l.342-1.615A4.808 4.808 0 0020.496 8c-1.88 0-3.248 1.039-3.248 2.481 0 1.097.969 1.673 1.653 2.02.74.346 1.025.577.968.923 0 .519-.57.75-1.139.75a4.795 4.795 0 01-1.994-.462l-.342 1.616a5.48 5.48 0 002.108.404c2.108.057 3.418-.981 3.418-2.539 0-1.962-2.678-2.077-2.678-2.942zm9.457 5.422L27.16 8.172h-1.652a.858.858 0 00-.798.577l-2.848 6.924h1.994l.398-1.096h2.45l.228 1.096h1.766zm-2.905-5.482l.57 2.827h-1.596l1.026-2.827z" fill="#fff"></path>
                  </svg>
                  <p class="sr-only">Visa</p>
                </div> --}}
                <div class="w-full">
                  <div class="flex justify-between items-center">
                    <p class="text-gray-900">{{ $order->payment->issuer_name }}</p>
                    <p class="text-gray-900">S/. {{ $order->payment->amount }}</p>
                  </div>   
                  <div class="flex justify-between items-center">
                    <p class="text-gray-900 capitalize">{{ $order->payment->method }}  {{ $order->payment->country_id ? '- '.$order->payment->country->name : '' }}</p>
                    <p class="text-gray-900"> {{ $order->payment->transaction_code ? '#'.$order->payment->transaction_code : '' }}</p>
                  </div> 
                  <div class="flex justify-between items-center">
                    <p class="text-gray-900 capitalize">{{ $order->payment->email }}</p>
                    <p class="text-gray-900 capitalize">{{ $order->payment->created_at->format('d/m/Y') }}</p>
                  </div>                   
                </div>
              </div>
            </div>
          @else
          <!-- Payment Detail -->
          <div class="border-t border-gray-200 px-4 py-4 sm:px-6">
            <div class="grid grid-cols-4 gap-y-6 gap-x-4">
              <div class="col-span-4">
                <label for="payment_method" class="form-label">{{ __('Método de pago') }}</label>
                <div class="mt-1">
                  <select wire:model="payment_method" id="payment_method" class="form-control">
                    <option value="" selected>{{ __('Seleccione un método') }}</option>
                    <option value="western union">Western Union</option>
                    <option value="moneygram">MoneyGram</option>
                    <option value="paypal">Paypal</option>
                    <option value="transferencia bancaria">Transferencia Bancaria</option>
                    <option value="yape">Yape</option>
                    <option value="plin">Plin</option>
                  </select>
                  @error('payment_method') <span class="error">*{{ $message }}</span> @enderror
                </div>
              </div>

              <div class="col-span-4 {{ $payment_vissuerName ? '' : 'hidden' }}">
                <label for="payment_issuer_name" class="form-label"> {{ $payment_method != 'paypal' ? __('Nombre de emisor') : __('Nombre en paypal')  }}</label>
                <div class="mt-1">
                  <input type="text" wire:model.defer="payment_issuerName" id="payment_issuer_name" class="form-control">
                  @error('payment_issuerName') <span class="error">*{{ $message }}</span> @enderror
                </div>
              </div>

              <div class="col-span-4 {{ $payment_vemail ? '' : 'hidden' }}">
                <label for="payment_email" class="form-label">{{ __('Email') }}</label>
                <div class="mt-1">
                  <input type="text" wire:model.defer="payment_email" id="payment_email" class="form-control">
                  @error('payment_email') <span class="error">*{{ $message }}</span> @enderror
                </div>
              </div>

              <div class="col-span-4 {{ $payment_vcountry ? '' : 'hidden' }}">
                <label for="payment_country" class="form-label">{{ __('País') }}</label>
                <div class="mt-1">
                  <select wire:model.defer="payment_country" id="payment_country" class="form-control">
                    @foreach ($countries as $country)
                      <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                  </select>
                  @error('payment_country') <span class="error">*{{ $message }}</span> @enderror
                </div>
              </div>

              <div class="col-span-2 {{ $payment_vamount ? '' : 'hidden' }}">
                <label for="payment_amount" class="form-label">{{ __('Monto') }} (S/.)</label>
                <div class="mt-1">
                  <input type="number" wire:model.defer="payment_amount" id="payment_amount" class="form-control">
                  @error('payment_amount') <span class="error">*{{ $message }}</span> @enderror
                </div>
              </div>

              <div class="col-span-2 {{ $payment_vtransactionCode ? '' : 'hidden' }}">
                <label for="payment_transaction_code" class="form-label">{{ __('Código de transacción') }}</label>
                <div class="mt-1">
                  <input type="text" wire:model.defer="payment_transactionCode" id="payment_transaction_code" class="form-control">
                  @error('payment_transactionCode') <span class="error">*{{ $message }}</span> @enderror
                </div>
              </div>
          
            </div>
          
            @if (!empty($payment_method))
            <div class="flex justify-end pt-4">
              <button type="button" wire:click="savePaymentData" wire:loading.attr="disabled" wire:target="savePaymentData" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-theme-yellow py-2 px-4 text-sm font-medium text-white shadow-sm opacity-75 hover:opacity-100 focus:outline-none focus:ring-2 focus:ring-transparent focus:ring-offset-2 disabled:opacity-50 uppercase">
                <svg wire:loading wire:target="savePaymentData" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span wire:loading.remove  wire:target="savePaymentData">{{  __('Guardar') }}</span>
                <span wire:loading  wire:target="savePaymentData">{{  __('Guardando...') }}</span>
              </button>
            </div>
            @endif
          </div>
          @endif
        </div>
      </section>
    </div>

    
    
  </div>
</div>
