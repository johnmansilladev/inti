<?php

namespace App\Http\Livewire;

use Cart;
use Livewire\Component;
use App\Models\Category;
use App\Models\Interfase;

class Navigation extends Component
{

    public $totalQuantityCart = 0;
    public $firstLevelMenu = '';
    public $secondLevelMenu = '';
    public $dataSecondLevelMenu = [];

    protected $listeners = [
        'sumTotalQuantityCart' => 'getTotalQuantityCart'
    ];

    public function getTotalQuantityCart() 
    {
        $this->totalQuantityCart = Cart::getTotalQuantity();
    }

    public function updatingFirstLevelMenu($slug)
    {     
        $this->secondLevelMenu = '';
        $this->dataSecondLevelMenu = [];
    }

    public function updatingSecondLevelMenu($slug)
    {
        $this->dataSecondLevelMenu = [];

        if ($this->firstLevelMenu == 'categories') {
            $category = Category::where('slug',$slug)->first();
            $this->dataSecondLevelMenu = $category->products->take(10);
        }
        
        if($this->firstLevelMenu == 'interfaces') {
            $interface = Interfase::where('slug',$slug)->first();
            $this->dataSecondLevelMenu = $interface->products->take(10);
        }
    }

    public function render()
    {
        $this->getTotalQuantityCart();

        return view('livewire.navigation',[
            'categories' => Category::all(),
            'interfaces' => Interfase::all()
        ]);
    }
}
