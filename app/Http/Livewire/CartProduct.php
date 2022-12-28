<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartProduct extends Component
{
    public $cartItems;
    protected $listeners = ['render'];

    public function cartList()
    {
        $this->cartItems = Cart::getContent();
    }

    public function removeCart($id)
    {
        Cart::remove($id);
        $this->emitTo('navigation','totalItemsCart');
    }

    public function decrementCart($id)
    {
        Cart::update($id, array(
            'quantity' => -1,
        ));

        $this->cartList();

    }

    public function incrementCart($id)
    {
        Cart::update($id, array(
            'quantity' => 1,
        ));

        $this->cartList();
    }

    public function render()
    {
        $this->cartList();

        return view('livewire.cart-product');
    }
}
