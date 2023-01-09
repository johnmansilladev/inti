<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Search extends Component
{

    public $searchTerm='';

    public function searchProduct(){
        // dd(Product::like('name',$this->search)->get());
        redirect()->route('shop', ['shop_section' => 'search','shop_section_url'=> $this->searchTerm]);
    }

    public function render()
    {
        return view('livewire.search');
    }
}
