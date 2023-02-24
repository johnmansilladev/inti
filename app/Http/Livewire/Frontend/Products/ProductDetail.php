<?php

namespace App\Http\Livewire\Frontend\Products;

use App\Models\Product;
use App\Models\Service;
use Livewire\Component;
use App\Models\StockKeepingUnit;
use App\Models\SpecificationGroup;
use Illuminate\Support\Facades\Storage;

class ProductDetail extends Component
{
    public $product, $sku_selected, $img_selected;
    public $specification_groups;

    public $openModalService = false;
    public $service_selected;

    protected $listeners = [
        'updateSkuSelected',
        'showModalService',
    ];

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->sku_selected = $product->stockKeepingUnits->where('active',1)->first();
        $this->img_selected = Storage::url($this->sku_selected->images->first()->url ?? 'products/no-image.png');

        $this->updateSpecificationGroups($this->sku_selected);

    }

    public function updateSkuSelected($id)
    {
        $this->sku_selected = StockKeepingUnit::find($id);
        $this->img_selected = Storage::url($this->sku_selected->images->first()->url ?? 'products/no-image.png');

        $this->updateSpecificationGroups($this->sku_selected);
    }

    public function updateSpecificationGroups($sku) {

        $this->specification_groups = SpecificationGroup::where('active',true)->with(['specifications' => function ($query) use ($sku) {
            $query->whereHas('specificationAssociations', function ($query) use ($sku) {
                $query->where('stock_keeping_unit_id', $sku->id);
            })->with(['specificationValues' => function ($query) use ($sku) {
                $query->whereHas('specificationAssociations', function ($query) use ($sku) {
                    $query->where('stock_keeping_unit_id', $sku->id);
                });
            }]);
        }])->get();

    }

    public function showModalService($id) 
    {
        $this->openModalService = true;
        $this->service_selected = Service::find($id);
    }

    public function hydrate() {
        $this->updateSpecificationGroups($this->sku_selected);
    }

    public function render()
    {
        return view('livewire.frontend.products.product-detail');
    }
}
