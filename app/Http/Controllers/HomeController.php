<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request) 
    {
        $sliders = Slider::where(function($query){
            $query->where([['date_from', '<=', now()],['date_to', '>=', now()]]);
        })->orWhere(function($query){
            $query->whereNull('date_from')
                ->whereNull('date_to');
        })->where('active',true)
        ->orderBy('position','asc')
        ->get();

        $categories = Category::where('active',true)
                                ->orderBy('position','asc')
                                ->get();

        $last_updates = Product::where('active',true)
        ->whereHas('stockKeepingUnits', function($query){
            $query->orderBy('release_date','desc');
        })->take(10)
        ->get();

        return view('home',compact('sliders','categories','last_updates'));
    }
}
