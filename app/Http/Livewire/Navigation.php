<?php

namespace App\Http\Livewire;

use Cart;
use Livewire\Component;

class Navigation extends Component
{

    public $totalQuantityCart = 0;

    protected $listeners = [
        'sumTotalQuantityCart' => 'getTotalQuantityCart'
    ];

    public function getTotalQuantityCart() 
    {
        $this->totalQuantityCart = Cart::getTotalQuantity();
    }

    public function render()
    {
        $this->getTotalQuantityCart();

        return view('livewire.navigation');
    }
}
