<?php

namespace App\Http\Livewire\Frontend\Products;

use Cart;
use App\Models\Product;
use App\Models\Service;
use Livewire\Component;
use App\Models\Promotion;
use App\Models\StockKeepingUnit;

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
            $this->sku_selected = $product->whereSkuSlug($this->version);
        } else {
            $this->sku_selected = $product->firstSku();
        }

        if ($this->service) {
            $this->service_selected = $this->sku_selected->whereServiceSlug($this->service);  
        } else {
            $this->service_selected = $this->sku_selected->firstService();
        }

        $this->version = $this->sku_selected->slug;
        $this->service = $this->service_selected->slug;
    }

    public function hydrate()
    {
        $this->service_selected = $this->sku_selected->services->find($this->service_selected->id);
    }

    public function addServiceItemCart() 
    {

        $base_price = $this->service_selected->pivot->base_price;

        $item = [
            'id' => $this->sku_selected->id.$this->service_selected->id,
            'name' => $this->product->name,
            'qty' => $this->qty ? $this->qty : 1,
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

            switch ($promotion->type_promotion) {
                case Promotion::PERCENTAGE:
                    $dcto = round($promotion->discount_rate);
                    $sale_price = round($price_base - (($price_base * $dcto) / 100),1);
                    break;
                case Promotion::FIXED_AMOUNT:
                    $sale_price = round($price_base - $promotion->discount_rate,1);
                    break;
                default:
                    break;
            }
        }

        $item['price'] = $sale_price;
        $item['options']['service_dcto'] = $dcto; 

        // add the product to cart
        Cart::instance('cart')->add($item);

        $this->emitTo('navigation','sumTotalQuantityCart');
        $this->emitTo('frontend.products.cart-product','show');

    }

    public function updateSkuSelected($id) 
    {
        $this->sku_selected = StockKeepingUnit::active()->find($id);
        $this->version = $this->sku_selected->slug;

        $this->service_selected = $this->sku_selected->firstService();
        $this->service = $this->service_selected->slug;

        $this->emitTo('frontend.products.product-detail','updateSkuSelected', $this->sku_selected->id);
    }

    public function updateServiceSelected($id)
    {
        $this->service_selected = $this->sku_selected->services->find($id);
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
