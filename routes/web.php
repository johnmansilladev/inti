<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Livewire\Frontend\Abouts\ContactController;
use App\Http\Livewire\Frontend\Abouts\AboutController;
use App\Http\Livewire\Frontend\Abouts\FrequentquestionController;
use Illuminate\Support\Facades\Route;

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
Route::get('shop/{shop_section}/{shop_section_url?}', [ShopController::class,'shop'])->name('shop');
Route::get('product/{product}', [ProductController::class, 'index'])->name('product.index');
Route::get('about/contact',ContactController::class)->name('contact');
Route::get('about',AboutController::class)->name('about');
Route::get('about/frequent-questions',FrequentquestionController::class)->name('frequent-question');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
