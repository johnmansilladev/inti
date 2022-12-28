<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\StockKeepingUnit;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product, $sku_selected, $sku_service_Selected;

    public $qty = 1;

    protected $listeners = [];



    public function mount(Product $product)
    {
        $this->product = $product;
        // $this->sku_selected = $product->stockKeepingUnits->first();
        // $this->sku_service_Selected = $this->sku_selected->services->first();
    }

    // public function updateSkuSelected($value)
    // {
    //     $this->sku_selected = $this->product->stockKeepingUnits->find($value);
    //     $this->sku_service_Selected = $this->sku_selected->services->first();
    // }

    // public function updateSkuServiceSelected($value)
    // {
    //     $this->sku_service_Selected = $this->sku_selected->services->find($value);
    // }

    // public function decrement()
    // {
    //     $this->qty = $this->qty - 1;
    // }

    // public function increment()
    // {
    //     $this->qty = $this->qty + 1;
    // }

    public function render()
    {
        return view('livewire.product-detail');
    }
}
