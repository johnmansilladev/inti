<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class homeController extends Component
{
    public function render()
    {
        return view('livewire.admin.home')->layout('layouts.admin');
    }
}
