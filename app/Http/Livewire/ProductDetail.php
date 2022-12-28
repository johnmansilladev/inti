<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\StockKeepingUnit;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product, $sku_selected, $img_selected;

    protected $listeners = [
        'updateSkuSelected'
    ];

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->sku_selected = $product->stockKeepingUnits->first();
        $this->img_selected = Storage::url($this->sku_selected->images->first()->url);
    }

    public function updateSkuSelected($value)
    {
        $this->sku_selected = StockKeepingUnit::find($value);
    }

    public function updateImgSelected($value) 
    {
        $this->img_selected = Storage::url($this->sku_selected->images->find($value)->url);
    }

    public function render()
    {
        return view('livewire.product-detail');
    }
}
