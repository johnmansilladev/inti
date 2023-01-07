<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Product $product) 
    {

        $related_products = Product::where([['category_id',$product->category_id],['active',true]])
                                            ->orderBy('release_date','desc')
                                            ->take(12)
                                            ->get();

        return view('frontend.products.index',compact('product','related_products'));

    }
}
