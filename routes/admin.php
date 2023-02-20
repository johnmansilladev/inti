<?php

use App\Http\Livewire\Admin\homeController;
use App\Http\Livewire\Admin\Orders\OrderEdit;
use App\Http\Livewire\Admin\Orders\OrderIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('admin.home');
});
Route::get('home', homeController::class)->name('admin.home');
Route::get('orders',OrderIndex::class)->name('admin.orders.index');
Route::get('orders/{order}/edit', OrderEdit::class)->name('admin.orders.edit');