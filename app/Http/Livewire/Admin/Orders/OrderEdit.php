<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use Livewire\Component;

class OrderEdit extends Component
{
    public $order;

    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('livewire.admin.orders.order-edit')->layout('layouts.admin');
    }
}
