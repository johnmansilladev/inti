<?php

namespace App\Http\Livewire\Frontend\Carts;

use Livewire\Component;
use Cart;

class CartShoppingController extends Component
{
    public $cartItems;
    public $totalQuantity = 0;
    public $subtotal = 0; // el subtotal sin incluir las promociones. 
    public $total = 0; // el total incluido las promociones y cupones aplicados.

    public function cartList()
    {
        $this->cartItems = Cart::getContent();
        $this->totalQuantity = Cart::getTotalQuantity();
        $this->subtotal = Cart::getSubTotal();
        $this->total = Cart::getTotal();
    }

    public function render()
    {
        $this->cartList();

        return view('livewire.frontend.carts.cart-shopping');
    }

    public function removeCart($id)
    {
        Cart::remove($id);
        $this->emitTo('navigation','sumTotalQuantityCart');
    }

    public function decrementCart($id)
    {
        Cart::update($id, array(
            'quantity' => -1,
        ));

        $this->emitTo('navigation','sumTotalQuantityCart');

    }

    public function incrementCart($id)
    {
        Cart::update($id, array(
            'quantity' => 1,
        ));

        $this->emitTo('navigation','sumTotalQuantityCart');
    }
}
