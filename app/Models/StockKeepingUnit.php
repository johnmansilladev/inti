<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockKeepingUnit extends Model
{
    use HasFactory;

    protected $guarded = ['id','active'];

    protected $casts = [
        'active' => 'boolean',
    ];

    // Relación muchos a muchos
    public function services()
    {
        return $this->belongsToMany(Service::class,'service_sku_prices')
                    ->withPivot('cost_price','markup','base_price','dcto','sale_price')
                    ->wherePivot('apply_to',2)
                    ->withTimestamps();
    }

    // Relación uno a muchos inversa
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relación uno a muchos polimorfica
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function videos()
    {
        return $this->morphMany(Video::class, 'videoable');
    }

    // URL amigable
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
