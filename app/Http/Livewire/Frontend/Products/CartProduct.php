<?php

namespace App\Http\Livewire\Frontend\Products;

use Livewire\Component;
use Cart;

class CartProduct extends Component
{

    public $showSidebarCart = false;
    public $cartItems = [];
    public $totalQuantity = 0;
    public $subtotal = 0; // el subtotal sin incluir las promociones. 
    public $total = 0; // el total incluido las promociones y cupones aplicados.

    protected $listeners = [
        'show' => 'showSidebar'
    ];

    public function cartList()
    {
        $this->cartItems = Cart::getContent();
        $this->totalQuantity = Cart::getTotalQuantity();
        $this->subtotal = Cart::getSubTotal();
        $this->total = Cart::getTotal();
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

    public function showSidebar() 
    {
        $this->showSidebarCart = true;
    }

    public function hideSidebar() 
    {
        $this->showSidebarCart = false;
    }

    public function render()
    {
        $this->cartList();

        return view('livewire.frontend.products.cart-product');
    }
}
