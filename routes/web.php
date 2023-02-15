<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Livewire\Frontend\Abouts\AboutController;
use App\Http\Livewire\Frontend\Abouts\ContactController;
use App\Http\Livewire\Frontend\Carts\CartShoppingController;
use App\Http\Livewire\Frontend\Checkouts\CheckoutController;
use App\Http\Livewire\Frontend\Abouts\FrequentQuestionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',HomeController::class)->name('home');
Route::get('about/contact',ContactController::class)->name('contact');
Route::get('shop/{shop_section}/{shop_section_url?}', [ShopController::class,'shop'])->name('shop');
Route::get('product/{product}', [ProductController::class, 'index'])->name('product.index');
Route::get('cart',CartShoppingController::class)->name('cart');
Route::get('checkout',CheckoutController::class)->name('checkout');
Route::get('order/{order}',[OrderController::class, 'show'])->name('order.show');

Route::get('about',AboutController::class)->name('about');
Route::get('about/frequent-questions',FrequentQuestionController::class)->name('frequent-question');
Route::view('about/terms-and-conditions','frontend.abouts.terms-and-conditions');
Route::view('about/how-to-buy','frontend.abouts.how-to-buy');
Route::view('about/bills-and-invoices','frontend.abouts.bills-and-invoices');
Route::view('about/privacy-policy','frontend.abouts.privacy-policy');