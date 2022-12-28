<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    // public function subcategories()
    // {
    //     return $this->hasMany(Category::class)->with('categories');
    // }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    //Relacion uno a muchos a traves de una tabla
    public function stockKeepingUnits()
    {
        return $this->hasManyThrough(StockKeepingUnit::class, Product::class);
    }

    // public function relatedProducts()
    // {
    //     return $this->hasManyThrough(StockKeepingUnit::class, Product::class)->take(10);
    // }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
