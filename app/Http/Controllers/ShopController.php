<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Interfase;
use App\Models\Collection;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop($shop_section,$shop_section_url='') 
    {
        switch ($shop_section) {
            case 'category':
                $data_section = Category::where('slug',$shop_section_url)->first();
                break;
            case 'interface':
                $data_section = Interfase::where('slug',$shop_section_url)->first();
                break;
            case 'collection':
                $data_section = Collection::where('slug',$shop_section_url)->first();
                break;
            case 'categories':
            case 'interfaces':
                $data_section = [];
                break;           
            default:
                // no existe url section
                break;
        }

        return view('frontend.shops.index',compact('shop_section','shop_section_url','data_section'));
    }
}
