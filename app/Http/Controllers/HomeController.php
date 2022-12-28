<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use App\Models\Slider;
use App\Models\StockKeepingUnit;
use Illuminate\Http\Request;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $sliders = Slider::where(function($query){
                                $query->where([['date_from', '<=', now()],['date_to', '>=', now()]]);
                            })->orWhere(function($query){
                                $query->whereNull('date_from')
                                    ->whereNull('date_to');
                            })->where('active',true)
                            ->orderBy('position','desc')
                            ->get();

        $categories = Category::where('active',true)
                                ->orderBy('position','asc')
                                ->get();

        $last_updates = Product::where('active',true)
                                ->orderBy('release_date','desc')
                                ->take(10)
                                ->get();

        // return $last_updates->load('stockKeepingUnits');

        $banners = Banner::where(function($query){
            $query->where([['date_from', '<=', now()],['date_to', '>=', now()]]);
        })->orWhere(function($query){
            $query->whereNull('date_from')
                ->whereNull('date_to');
        })->where('active',true)
        ->orderBy('position','asc')
        ->get();

        return view('home',compact('sliders','categories','banners','last_updates'));

    }
}
