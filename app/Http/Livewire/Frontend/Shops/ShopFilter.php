<?php

namespace App\Http\Livewire\Frontend\Shops;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Interfase;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class ShopFilter extends Component
{
    use WithPagination;

    public $data_section,$shop_section,$shop_section_url;
    public $categories,$interfaces,$brands;
    public $categoriesFilter=[],$interfacesFilter=[],$brandsFilter=[];
    public $sortFilter='OrderByRecommended',$search='';
    public $view = 'grid'; 
    public $totalfiltersApplied = 0;
    public $checkboxesLocked = false;
    // public $products = [];

    public $filters = [
        'categories' => [],
        'brands' => [],
        'interfaces' => [],
    ];

    public $filtersApplied = [
        'categories' => [],
        'brands' => [],
        'interfaces' => [],
    ];

    protected $queryString = [
        'sortFilter' => ['except' => ''],
        'search' => ['except' => ''],
        'page' => ['except' => 1]
    ];

    public function mount()
    {
        $this->filters();
    }

    public function filters()
    {
        switch ($this->shop_section) {
            case 'search':
                $this->data_section = [];

                $this->filters['brands'] = Brand::whereHas('products',function ($query){
                    $query->active()->like('name',$this->shop_section_url);
                })->get()->toArray();

                $this->filters['interfaces'] = Interfase::whereHas('products',function ($query){
                    $query->active()->like('name',$this->shop_section_url);
                })->get()->toArray();

                $this->filters['categories'] = Category::whereHas('products',function ($query){
                    $query->active()->like('name',$this->shop_section_url);
                })->get()->toArray();;

                break;
            case 'category':
                $this->data_section = Category::where('slug',$this->shop_section_url)->first();

                $this->filters['brands'] = Brand::whereHas('products',function ($query){
                    $query->active()->whereHas('category',function($query){
                        $query->where('id', $this->data_section->id);
                    });
                })->get()->toArray();

                $this->filters['interfaces'] = Interfase::whereHas('products',function ($query){
                    $query->active()->whereHas('category',function($query){
                        $query->where('id', $this->data_section->id);
                    });
                })->get()->toArray();

                $this->filters['categories'] = [];

                break;
            case 'interface':
                $this->data_section = Interfase::where('slug',$this->shop_section_url)->first();

                $this->filters['brands'] = Brand::whereHas('products',function ($query){
                    $query->active()->whereHas('interfases',function($query){
                        $query->where('interfases.id', $this->data_section->id);
                    });
                })->get()->toArray();

                $this->filters['categories'] = Category::whereHas('products',function ($query){
                    $query->active()->whereHas('interfases',function($query){
                        $query->where('interfases.id', $this->data_section->id);
                    });
                })->get()->toArray();

                $this->filters['interfaces'] = [];

                break;

            case 'brand':
                $this->data_section = Brand::where('slug',$this->shop_section_url)->first();

                $this->filters['categories'] = Category::whereHas('products',function ($query){
                    $query->active()->whereHas('brand',function($query){
                        $query->where('id', $this->data_section->id);
                    });
                })->get()->toArray();

                $this->filters['interfaces'] = Interfase::whereHas('products',function ($query){
                    $query->active()->whereHas('brand',function($query){
                        $query->where('id', $this->data_section->id);
                    });
                })->get()->toArray();

                $this->filters['brands'] = [];

                break;
            case 'categories':
            case 'interfaces':
            case 'brands':
                $this->data_section = [];

                $this->filters['brands'] = Brand::whereHas('products',function ($query) {
                    $query->active();
                })->get()->toArray();

                $this->filters['categories'] = Category::whereHas('products',function ($query) {
                    $query->active();
                })->get()->toArray();

                $this->filters['interfaces'] = Interfase::whereHas('products',function ($query) {
                    $query->active();
                })->get()->toArray();

                break;
            default:
                // no existe url section
                break;
        }
    }

    public function updatingSearch() 
    {
        $this->resetPage();
    }

    public function updatingFiltersApplied() 
    {
        $this->resetPage();
    }

    public function removeFilter($filterType, $filterKey)
    {
        if (array_key_exists($filterType, $this->filtersApplied)) {
            unset($this->filtersApplied[$filterType][$filterKey]);
            $this->filtersApplied[$filterType] = array_values($this->filtersApplied[$filterType]);
        }
    }

    public function totalFilterApplied() {
        $this->totalfiltersApplied = 0;
        foreach ($this->filtersApplied as $filter) {
            $this->totalfiltersApplied += count($filter);
        }
    }

    public function applyFilters() {

    }



    public function render()
    {
        $productsQuery = Product::query()->active();
        
        if ($this->shop_section == 'search') {
            $productsQuery = $productsQuery->like('name',$this->shop_section_url);
           
        }else if ($this->shop_section == 'category') {
            $productsQuery = $productsQuery->where([['category_id',$this->data_section->id],['active',true]]);
        } else if ($this->shop_section == 'interface') {
            $productsQuery = $productsQuery->whereHas('interfases',function($query){
                $query->where([['interfases.id',$this->data_section->id],['active',true]]);
            });
        } else if ($this->shop_section == 'brand') { 
            $productsQuery = $productsQuery->where([['brand_id',$this->data_section->id],['active',true]]);
        } else if ($this->shop_section == 'collection') {
            // $productsQuery = ;
        }

        $productsQuery = $productsQuery->when($this->filtersApplied['brands'], function($query){
            $query->whereHas('brand', function($query) {
                $query->whereIn('name', $this->filtersApplied['brands']);
            });
        })->when($this->filtersApplied['categories'], function($query){
            $query->whereHas('category', function($query) {
                $query->whereIn('name',$this->filtersApplied['categories']);
            });
        })->when($this->filtersApplied['interfaces'], function($query){
            $query->whereHas('interfases',function($query){
                $query->whereIn('name',$this->filtersApplied['interfaces']);
            });
        });

         //search input
        if (!empty($this->search)) {
            $productsQuery = $productsQuery->where('name','like','%'.$this->search.'%'); 
        }

        //  Order products
        if ($this->sortFilter == 'OrderByRecommended') {
            $productsQuery = $productsQuery->skuOrder();
        } else if ($this->sortFilter == 'OrderByNameASC') {
            $productsQuery = $productsQuery->orderBy('name');
        } else if ($this->sortFilter == 'OrderByNameDESC') {
            $productsQuery = $productsQuery->orderBy('name','desc');
        } else if ($this->sortFilter == 'OrderByPriceASC') {
            // $productsQuery = 
        } else if ($this->sortFilter == 'OrderByPriceDESC') {
            // $productsQuery = 
        }
        
        $products = $productsQuery->paginate(12);

        $this->totalFilterApplied();
        
        return view('livewire.frontend.shops.shop-filter',[ 
            'products' => $products
        ]);
    }
}
