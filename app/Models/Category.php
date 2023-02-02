<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id','active'];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Relación muchos a muchos

    public function specificationGroups()
    {
        return $this->belongsToMany(specificationGroup::class);
    }

    //Relacion uno a muchos a traves de una tabla
    public function stockKeepingUnits()
    {
        return $this->hasManyThrough(StockKeepingUnit::class, Product::class);
    }

    // URL amigable
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
