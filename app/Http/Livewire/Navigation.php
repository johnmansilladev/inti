<?php

namespace App\Http\Livewire;

use Cart;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Category;
use App\Models\Interfase;
use App\Models\Announcement;

class Navigation extends Component
{

    public $categories=[];
    public $interfaces=[];
    public $announcements=[];
    public $totalQuantityCart = 0;
    public $firstLevelMenu = '';
    public $secondLevelMenu = '';
    public $dataSecondLevelMenu = [];

    protected $listeners = [
        'sumTotalQuantityCart' => 'getTotalQuantityCart'
    ];

    public function mount()
    {
        $this->categories = Category::where('active',true)
                                    ->orderBy('position','asc')
                                    ->get();
                                    
        $this->interfaces = Interfase::where('active',true)
                                    ->orderBy('position','asc')
                                    ->get();

        $this->announcements = Announcement::active()->get();
    }

    public function getTotalQuantityCart() 
    {
        $this->totalQuantityCart = Cart::instance('cart')->content()->count();
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

        return view('livewire.navigation');
    }
}
