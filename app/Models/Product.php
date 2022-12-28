<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Relacion uno a muchos inversa
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //Relacion uno a muchos
    public function stockKeepingUnits()
    {
        return $this->hasMany(StockKeepingUnit::class)->orderBy('release_date','desc');
    }

     // Relacion muchos a muchos
    public function collections()
    {
        return $this->belongsToMany(Collection::class)->withTimestamps();
    }

    public function interfases()
    {
        return $this->belongsToMany(Interfase::class)->withTimestamps();
    }

    // URL amigable
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
