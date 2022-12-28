<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Interfase;
use Livewire\Component;
use Cart;
class Navigation extends Component
{

    public $menuItemsNivel1=[],$menuItemsNivel2=[];
    public $menuNivel1,$menuNivel2;
    public $shoppingCartOpen=false,$totalItemsCart=0;

    protected $listeners = [
        'showMenuNivel1',
        'showMenuNivel2',
        'totalItemsCart',
        'shoppingCartOpen',
    ];

    public function mount() 
    {
        $this->totalItemsCart();
    }

    public function showMenuNivel1($value) 
    {
        if(empty($value)) {
            $this->reset(['menuItemsNivel1','menuItemsNivel2','menuNivel1','menuNivel2']);
            return;
        }

        $this->menuNivel1 = $value;
        $this->menuItemsNivel2 = [];

        switch ($value) {
            case 'categorias':
                $this->menuItemsNivel1 = Category::all();
                break;
            case 'interfaces':
                $this->menuItemsNivel1 = Interfase::all();
                break;
            default:
                $this->menuItemsNivel1 = [];
                $this->menuItemsNivel2 = [];
                break;
        }
    }

    public function showMenuNivel2($value) 
    {
        switch ($this->menuNivel1) {
            case 'categorias':
                $category = Category::find($value);
                $this->menuNivel2 = $category->name;
                $this->menuItemsNivel2 = $category->products->take(10);
                break;
            case 'interfaces':
                $interface = Interfase::find($value);
                $this->menuNivel2 = $interface->name;
                $this->menuItemsNivel2 = $interface->products->take(10);
                break;
            default:
                $this->menuNivel2='';
                $this->menuItemsNivel2 = [];
                break;
        }
    }

    public function redirectNivel1($value) 
    {
        switch ($this->menuNivel1) {
            case 'categorias':
                $category = Category::find($value);
                return redirect()->route('category.index', [$category]);
                break;
            case 'interfaces':
                $interface = Interfase::find($value);
                return redirect()->route('interface.index', [$interface]);
                break;
            default:
                break;
        }
    }

    public function totalItemsCart() {
        $this->totalItemsCart = 0;
        $items = Cart::getContent();
        foreach ($items as $item) {
            $this->totalItemsCart +=  $item->quantity;
        }
    }

    public function shoppingCartOpen() 
    {
        $this->shoppingCartOpen = true;
        $this->emit('disabledPage');
    }

    public function render()
    {
        return view('livewire.navigation');
    }
}
