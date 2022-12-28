<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Interfase;
use App\Models\Product;
use App\Models\StockKeepingUnit;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryFilter extends Component
{
    use WithPagination;

    public $category,$brands;
    public $brandsFilter=[],$interfacesFilter=[];
    public $sortFilter='OrderByRecommended',$searchProduct='';

    protected $queryString = [
        'searchProduct' => ['except' => ''],
        'brandsFilter' => ['except' => ''],
        'interfacesFilter' => ['except' => ''],
    ];

    // public $filters = [
    //     'brands' => []
    // ];

    public function mount(){
        $this->brands = Brand::whereHas('products',function (Builder $query){
            $query->whereHas('category',function(Builder $query){
                $query->where('id', $this->category->id);
            });
        })->get();

        $this->interfases = Interfase::whereHas('products',function (Builder $query){
            $query->whereHas('category',function(Builder $query){
                $query->where('id', $this->category->id);
            });
        })->get();
    }

    public function updatingSearchProduct()
    {
        $this->resetPage();
    }

    public function render()
    {
        $productsQuery = Product::query()->where([['category_id',$this->category->id],['active',true]])
                                            ->when($this->brandsFilter, function($query){
                                                $query->whereIn('brand_id',$this->brandsFilter);
                                            })->when($this->interfacesFilter, function($query){
                                                $query->whereHas('interfases',function($query){
                                                    $query->whereIn('interfase_id',$this->interfacesFilter);
                                                });
                                            });     
                                            
        if (!empty($this->searchProduct)) {
            $productsQuery = $productsQuery->where('name','like','%'.$this->searchProduct.'%'); 
        }

        // Order products
        if ($this->sortFilter == 'OrderByRecommended') {
            
        } else if ($this->sortFilter == 'OrderByNameASC') {
            $productsQuery = $productsQuery->orderBy('name');
        } else if ($this->sortFilter == 'OrderByNameDESC') {
            $productsQuery = $productsQuery->orderBy('name','desc');
        } else if ($this->sortFilter == 'OrderByPriceASC') {
           
        } else if ($this->sortFilter == 'OrderByPriceDESC') {
           
        }
        
        $products = $productsQuery->paginate(12);

        return view('livewire.category-filter',[
            'products' => $products,
            'brands' => $this->brands,
            'interfase' => $this->interfases
        ]);

    }
}
