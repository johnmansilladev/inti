<?php

namespace App\Http\Livewire\Frontend\Products;

use App\Models\Product;
use Livewire\Component;
use App\Models\StockKeepingUnit;
use App\Models\SpecificationGroup;
use Illuminate\Support\Facades\Storage;

class ProductDetail extends Component
{
    public $product, $sku_selected, $img_selected;
    public $specification_groups;

    protected $listeners = [
        'updateSkuSelected'
    ];

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->sku_selected = $product->stockKeepingUnits->first();
        $this->img_selected = Storage::url($this->sku_selected->images->first()->url);

        $this->updateSpecificationGroups($this->sku_selected);

    }

    public function updateSkuSelected($value)
    {
        $this->sku_selected = StockKeepingUnit::find($value);
        $this->updateSpecificationGroups($this->sku_selected);
    }

    public function updateSpecificationGroups($sku) {

        $this->specification_groups = SpecificationGroup::with(['specifications' => function ($query) use ($sku) {
            $query->whereHas('specificationAssociations', function ($query) use ($sku) {
                $query->where('stock_keeping_unit_id', $sku->id);
            })->with('specificationValues');
        }])->get();
    }

    public function render()
    {
        return view('livewire.frontend.products.product-detail');
    }
}
