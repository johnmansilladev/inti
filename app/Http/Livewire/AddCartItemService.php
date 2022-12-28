<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\StockKeepingUnit;
use Livewire\Component;
use Cart;

class AddCartItemService extends Component
{

    public $product, $sku_selected, $service_selected;
    public $qty = 1;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->sku_selected = $product->stockKeepingUnits->first();
        $this->service_selected = $this->sku_selected->services->first();
    }

    public function hydrate()
    {
        $this->service_selected = $this->sku_selected->services->find($this->service_selected->id);
    }

    public function addItem()
    {
        // Cart::remove($this->sku_selected->id.$this->service_selected->id);

        // $itemCondition = new \Darryldecode\Cart\CartCondition(array(
        //     'name' => 'SALE 50%',
        //     'type' => 'sale',
        //     'value' => '-50%',
        // ));

        $item = [
            'id' => $this->sku_selected->id.$this->service_selected->id,
            'name' => $this->sku_selected->name,
            'price' =>  $this->service_selected->pivot->base_price,
            'quantity' => $this->qty ? $this->qty : 1,
            'attributes' => array(
                'sku_id' => $this->sku_selected->id,
                'sku_image' => $this->sku_selected->images->first()->url,
                'sku_brand' => $this->sku_selected->product->brand->name,
                'service_id' => $this->service_selected->id,
                'service_name' => $this->service_selected->name,
                'service_currency_id' => $this->service_selected->pivot->currency_type_id,
                'service_price' => $this->service_selected->pivot->base_price
            ),
            // 'conditions' => $itemCondition
            // 'associatedModel' => $this->sku_selected
        ];


        // add the product to cart
        Cart::add($item);

        $this->emitTo('cart-product', 'render');
        $this->emitTo('navigation', 'totalItemsCart');
        $this->emitTo('navigation','shoppingCartOpen');
    }

    public function updateSkuSelected($value)
    {
        $this->sku_selected = StockKeepingUnit::find($value);
        $this->service_selected = $this->sku_selected->services->first();
        $this->emit('updateSkuSelected', $this->sku_selected->id);
    }

    public function updateServiceSelected($value)
    {
        $this->service_selected = $this->sku_selected->services->find($value);
    }

    public function decrement()
    {
        $this->qty = $this->qty - 1;
    }

    public function increment()
    {
        $this->qty = $this->qty + 1;
    }

    public function render()
    {
        return view('livewire.add-cart-item-service');
    }
}
