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

        $last_updates = Product::where('active',true)
        ->whereHas('stockKeepingUnits', function($query){
            $query->orderBy('release_date','desc');
        })->take(10)
        ->get();

        $best_sellers = Product::join('stock_keeping_units AS sku', 'sku.product_id', '=', 'products.id')
        ->leftJoin('order_details AS odt', 'odt.stock_keeping_unit_id', '=', 'sku.id')
        ->orWhere('sku.active',true)
        ->select('products.*', DB::raw('IFNULL(sum(odt.qty),0) AS sale_total'))
        ->orderByRaw('sale_total DESC, release_date DESC')
        ->groupBy('products.id')
        ->orWhere('products.active',true)
        ->take(10)
        ->get();

        $super_offers = Product::select('products.*', DB::raw("
                            CASE prm.type_promotion
                                WHEN 1 THEN ROUND((ssp.base_price*IFNULL(prm.discount_rate,0))/100,2)
                                WHEN 2 THEN ROUND(IFNULL(prm.discount_rate,0),2)
                                ELSE 0
                            END AS discount_rate
                        "))
                        ->leftJoin('stock_keeping_units AS sku', 'sku.product_id', '=', 'products.id')
                        ->leftJoin('service_sku_prices AS ssp', 'ssp.stock_keeping_unit_id', '=', 'sku.id')
                        ->leftJoin(DB::raw("(SELECT pmt.*,ssp.stock_keeping_unit_id,ssp.service_id FROM promotions AS pmt
                                LEFT JOIN service_sku_promotion AS ssp ON ssp.promotion_id=pmt.id 
                                WHERE NOW() BETWEEN date_from AND date_to ORDER BY created_at DESC) AS prm"), function($join) {
                            $join->on('prm.stock_keeping_unit_id', '=', 'ssp.stock_keeping_unit_id')
                                ->on('prm.service_id', '=', 'ssp.service_id');
                        })
                        ->where('products.active', true)
                        ->groupBy('products.id', 'products.internal_id', 'products.name', 'products.trade_name', 'products.category_id', 'products.brand_id', 'products.slug', 'products.description', 'products.description_short', 'products.meta_title', 'products.meta_description', 'products.keywords', 'products.release_date', 'products.active', 'products.created_at', 'products.updated_at', 'discount_rate', 'ssp.base_price', 'prm.type_promotion')
                        ->orderByRaw('discount_rate DESC')
                        ->distinct()
                        ->take(10)
                        ->get();

        return view('home',compact('sliders','categories','last_updates','super_offers','best_sellers'));
    }
}
