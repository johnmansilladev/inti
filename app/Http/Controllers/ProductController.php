<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Product $product) 
    {
        // $product = StockKeepingUnit::where('slug',$slug)->first();

        // $related_products = DB::table('products AS prod')
        //                         ->join('stock_keeping_units AS sku','prod.id','=','sku.product_id')
        //                         ->join('brands AS brd','prod.brand_id','=','brd.id')
        //                         ->where('prod.category_id',$product->product->category_id)
        //                         ->select('sku.*','prod.brand_id','brd.name AS brand')
        //                         ->get();

        $related_products = Product::where([['category_id',$product->category_id],['active',true]])
                                            ->orderBy('release_date','desc')
                                            ->take(12)
                                            ->get();

        return view('products.index',compact('product','related_products'));

    }
}
