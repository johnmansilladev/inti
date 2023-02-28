<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

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

        $last_updates = Product::join('stock_keeping_units', 'stock_keeping_units.product_id', '=', 'products.id')
                        ->select('products.*', DB::raw('MAX(stock_keeping_units.release_date) AS last_updated'))
                        ->where('products.active',true)
                        ->groupBy('products.id')
                        ->orderByDesc('last_updated')
                        ->take(10)
                        ->get();

        $best_sellers = Product::join('stock_keeping_units', 'stock_keeping_units.product_id', '=', 'products.id')
                        ->leftJoin('order_details','order_details.stock_keeping_unit_id', '=', 'stock_keeping_units.id')
                        ->select('products.*', DB::raw('IFNULL(sum(order_details.qty),0) AS sale_total'),DB::raw('MAX(stock_keeping_units.release_date) AS last_updated'))
                        ->where('products.active',true)
                        ->groupBy('products.id')
                        ->orderByDesc('sale_total')
                        ->orderByDesc('last_updated')
                        ->take(10)
                        ->get();

        $super_offers = Product::join('stock_keeping_units','stock_keeping_units.product_id', '=', 'products.id')
                                ->join('service_sku_prices','service_sku_prices.stock_keeping_unit_id','=','stock_keeping_units.id')
                                ->leftJoin(DB::raw("(SELECT promotions.*,service_sku_promotion.stock_keeping_unit_id,service_sku_promotion.service_id FROM promotions
                                                LEFT JOIN service_sku_promotion ON service_sku_promotion.promotion_id=promotions.id 
                                                WHERE NOW() BETWEEN date_from AND date_to ORDER BY created_at DESC) AS promotions"), function($join) {
                                            $join->on('promotions.stock_keeping_unit_id', '=', 'service_sku_prices.stock_keeping_unit_id')
                                                ->on('promotions.service_id', '=', 'service_sku_prices.service_id');
                                })->select('products.*',
                                        DB::raw("CASE promotions.type_promotion
                                                        WHEN 1 THEN ROUND((service_sku_prices.base_price*IFNULL(promotions.discount_rate,0))/100,2)
                                                        WHEN 2 THEN ROUND(IFNULL(promotions.discount_rate,0),2)
                                                        ELSE 0
                                                    END AS dcto
                                                "),
                                        DB::raw('MAX(stock_keeping_units.release_date) AS last_updated'))
                                ->where('products.active', true)
                                ->groupBy('products.id','dcto')
                                ->orderByDesc('dcto')
                                ->orderByDesc('last_updated')
                                ->take(10)
                                ->get();

        return view('home',compact('sliders','categories','last_updates','super_offers','best_sellers'));
    }
}
