<?php

namespace App\Http\Livewire\Frontend\Products;

use App\Models\Product;
use Livewire\Component;
use App\Models\StockKeepingUnit;
use Cart;

class ProductQuickviews extends Component
{
    
    public $showModalQuickviews = false;
    public $product;
    public $sku_selected,$service_selected;
    public $sku_id,$service_id;

    protected $listeners = [
        'showModalQuickviewsProduct' => 'loadProductDetails',
        'addToCartProduct' => 'addToCartProductBox'
    ];

    public function loadProductDetails($id) 
    {
        $this->product = Product::find($id);
        $this->sku_selected = $this->product->firstSku();
        $this->service_selected = $this->sku_selected->firstService();

        $this->sku_id = $this->sku_selected->id;
        $this->service_id = $this->service_selected->id;

        $this->showModal();
    }   

    public function updatingSkuId($id)
    {
        $this->sku_selected = StockKeepingUnit::active()->find($id);
        $this->service_selected = $this->sku_selected->firstService();

        $this->sku_id = $this->sku_selected->id;
        $this->service_id = $this->service_selected->id;
    }

    public function updatingServiceId($id)
    {
        $this->service_selected =  StockKeepingUnit::active()->find($this->sku_selected->id)
                                                    ->services->where('active',1)->find($id);
        $this->service_id = $this->service_selected->id;
    }

    public function addItemCart() 
    {

        $this->service_selected =  StockKeepingUnit::active()->find($this->sku_selected->id)
                                                    ->services->where('active',1)->find($this->service_selected->id);

        $base_price = $this->service_selected->basePrice();

        $item = [
            'id' => $this->sku_selected->id.$this->service_selected->id,
            'name' => $this->product->name,
            'qty' => 1,
            'options' => [
                'product_slug' => $this->product->slug,
                'sku_id' => $this->sku_selected->id,
                'sku_name' => $this->sku_selected->name,
                'sku_slug' => $this->sku_selected->slug,
                'sku_image' => $this->sku_selected->images->first()->url,
                'sku_brand' => $this->sku_selected->product->brand->name,
                'service_id' => $this->service_selected->id,
                'service_name' => $this->service_selected->name,
                'service_slug' => $this->service_selected->slug,
                'service_price' => $base_price
            ]
        ];

        $sale_price = $base_price;
        $dcto = 0;


        if ($this->sku_selected->hasPromotionsService($this->service_selected->id)) {
            $promotion = $this->sku_selected->discountedPriceService($this->service_selected->id);  
            if ($promotion->type_promotion == 1) {
                $dcto = round($promotion->discount_rate);
                $sale_price = round($base_price - (($base_price * $promotion->discount_rate) / 100),1);
            }else {
                $sale_price = round($base_price - $promotion->discount_rate,1);
            }
        }

        $item['price'] = $sale_price;
        $item['options']['service_dcto'] = $dcto; 

        Cart::instance('cart')->add($item);


        $this->emitTo('navigation','sumTotalQuantityCart');
        $this->showModalQuickviews = false;
        $this->emitTo('frontend.products.cart-product','show');
    }

    public function addToCartProductBox($id) 
    {
        $this->product = Product::find($id);
        $this->sku_selected = $this->product->firstSku();
        $this->service_selected = $this->sku_selected->firstService(); 

        $this->addItemCart();

    }

    public function showModal() 
    {
        $this->showModalQuickviews = true;
    }

    public function render()
    {
        return view('livewire.frontend.products.product-quickviews');
    }
}
