<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Interfase;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

class InterfaceFilter extends Component
{
    use WithPagination;

    public $interface,$brands;
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
            $query->whereHas('interfases',function(Builder $query){
                $query->where('id', $this->interface->id);
            });
        })->get();

        $this->interfases = Interfase::whereHas('products',function (Builder $query){
            $query->whereHas('interfases',function(Builder $query){
                $query->where('id', $this->interface->id);
            });
        })->get();
    }

    public function updatingSearchProduct()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        return view('livewire.interface-filter');
    }
}
