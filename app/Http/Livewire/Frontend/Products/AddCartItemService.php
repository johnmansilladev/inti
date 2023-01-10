<?php

namespace App\Http\Livewire\Frontend\Products;

use App\Models\Product;
use App\Models\Service;
use App\Models\StockKeepingUnit;
use Cart;
use Livewire\Component;

class AddCartItemService extends Component
{
    public $product, $sku_selected, $service_selected;
    public $version,$service;
    public $qty = 1;

    protected $queryString = [
        'version' => ['except' => ''],
        'service' => ['except' => ''],
    ];

    public function mount(Product $product) 
    {
        $this->product = $product;

        if ($this->version) {
            $this->sku_selected = $product->stockKeepingUnits
                                        ->where('slug',$this->version)
                                        ->where('active',1)
                                        ->first();
        } else {
            $this->sku_selected = $product->stockKeepingUnits
                                            ->where('active',1)
                                            ->first();
        }

        $this->version = $this->sku_selected->slug;

        if ($this->service) {
            $this->service_selected = $this->sku_selected
                                                ->services
                                                ->where('slug',$this->service)
                                                ->where('active',1)
                                                ->first();  
        } else {
            $this->service_selected = $this->sku_selected
                                                ->services
                                                ->where('active',1)
                                                ->first();  
        }
       
        $this->service = $this->service_selected->slug;
    }

    public function hydrate()
    {
        $this->service_selected = $this->sku_selected->services->find($this->service_selected->id);
    }

    public function addServiceItemCart() 
    {

        $item = [
            'id' => $this->sku_selected->id.$this->service_selected->id,
            'name' => $this->product->name,
            'price' =>  $this->service_selected->pivot->sale_price,
            'quantity' => $this->qty ? $this->qty : 1,
            'attributes' => array(
                'product_slug' => $this->product->slug,
                'sku_id' => $this->sku_selected->id,
                'sku_name' => $this->sku_selected->name,
                'sku_slug' => $this->sku_selected->slug,
                'sku_image' => $this->sku_selected->images->first()->url,
                'sku_brand' => $this->sku_selected->product->brand->name,
                'service_id' => $this->service_selected->id,
                'service_name' => $this->service_selected->name,
                'service_slug' => $this->service_selected->slug,
                'service_price' => $this->service_selected->pivot->base_price
            ),
            'associatedModel' => $this->product
        ];

        // add the product to cart
        Cart::add($item);

        $this->emitTo('navigation','sumTotalQuantityCart');
        $this->emitTo('frontend.products.cart-product','show');

    }

    public function updateSkuSelected($id) 
    {
        $this->sku_selected = StockKeepingUnit::where('active',1)->find($id);
        $this->version = $this->sku_selected->slug;

        $this->service_selected = $this->sku_selected->services->where('active',1)->first();
        $this->service = $this->service_selected->slug;

        $this->emitTo('frontend.products.product-detail','updateSkuSelected', $this->sku_selected->id);
    }

    public function updateServiceSelected($id)
    {
        $this->service_selected = $this->sku_selected->services->where('active',1)->find($id);
        $this->service = $this->service_selected->slug;
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
        return view('livewire.frontend.products.add-cart-item-service');
    }
}
