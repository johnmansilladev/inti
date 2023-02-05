<?php

namespace App\Http\Livewire\Frontend\Carts;

use Cart;
use Livewire\Component;
use App\Models\Promotion;
use App\Models\StockKeepingUnit;

class CartShoppingController extends Component
{
    public $cartItems;
    public $totalQuantity = 0;
    public $subtotal = 0; // el subtotal sin incluir las promociones. 
    public $total = 0; // el total incluido las promociones y cupones aplicados.

    public function cartList()
    {
        $this->cartItems = Cart::instance('cart')->content();

        if ($this->cartItems->count()) {
            foreach ($this->cartItems as $item) {
                $sku = StockKeepingUnit::find($item->options->sku_id);
                if ($sku->active) {
                    $services = $sku->services()->active()->get();
                    if($services->count() > 0) {
                        $service = $services->find($item->options->service_id);
                        if($service) {
                            $price_base = $service->basePrice();
                            $dcto = 0;
                            $price_sale = $price_base;

                            if($sku->hasPromotionsService($service->id)) {
                                $promotion = $sku->discountedPriceService($service->id);
                                switch ($promotion->type_promotion) {
                                    case Promotion::PERCENTAGE:
                                        $dcto = round($promotion->discount_rate);
                                        $price_sale = round($price_base - (($price_base * $dcto) / 100),1);
                                        break;
                                    case Promotion::FIXED_AMOUNT:
                                        $price_sale = round($price_base - $promotion->discount_rate,1);
                                        break;
                                    default:
                                        break;
                                }
                            }

                            $options = $item->options;
                            $options['product_slug'] = $sku->product->slug;
                            $options['sku_name'] = $sku->name;
                            $options['sku_slug'] = $sku->slug;
                            $options['sku_image'] = $sku->images->first()->url;
                            $options['sku_brand'] = $sku->product->brand->name;
                            $options['service_name'] = $service->name;
                            $options['service_slug'] = $service->slug;
                            $options['service_dcto'] = $dcto;
                            $options['service_price'] = $price_base;

                            Cart::update($item->rowId,['price'=>$price_sale,'options'=> $options]);
                        } else {
                            Cart::instance('cart')->remove($item->rowId);
                            $this->emitTo('navigation','sumTotalQuantityCart');
                        }
                    }
                } else {
                    Cart::instance('cart')->remove($item->rowId);
                    $this->emitTo('navigation','sumTotalQuantityCart');
                }
            }
        }


        $this->totalQuantity =  Cart::instance('cart')->content()->count();
        $this->subtotal = Cart::instance('cart')->subtotal();
        $this->total = Cart::instance('cart')->subtotal();
    }

    public function removeCart($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('navigation','sumTotalQuantityCart');
        
    }

    public function decrementCart($rowId)
    {
        $newQty = Cart::instance('cart')->get($rowId)->qty - 1;
        Cart::instance('cart')->update($rowId,$newQty);
        $this->emitTo('navigation','sumTotalQuantityCart');

    }

    public function incrementCart($rowId)
    {
        $newQty = Cart::instance('cart')->get($rowId)->qty + 1;
        Cart::update($rowId,$newQty);
        $this->emitTo('navigation','sumTotalQuantityCart');
    }

    public function render()
    {
        $this->cartList();

        return view('livewire.frontend.carts.cart-shopping');
    }
}
