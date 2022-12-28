<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockKeepingUnit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Relacion muchos a muchos

    public function services()
    {
        return $this->belongsToMany(Service::class)->withPivot('currency_type_id','cost_price','markup','base_price')->withTimestamps();
    }

    //Relacion uno a muchos inversa
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    //Relacion uno a muchos polimorfica
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    // URL amigable
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
