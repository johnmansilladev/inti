<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = ['id','active'];

    protected $casts = [
        'active' => 'boolean',
    ];

    // Relación muchos a muchos inversa
    public function stockKeepingUnits()
    {
        return $this->belongsToMany(StockKeepingUnit::class,'service_sku_prices')->withTimestamps();
    }

    public function promotions()
    {
        return $this->belongsToMany(Promotion::class,'service_sku_promotion')->withTimestamps();
    }

    
    
}
