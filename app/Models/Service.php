<?php

namespace App\Models;

use App\Models\Configuration;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $guarded = ['id','active'];

    protected $casts = [
        'active' => 'boolean',
    ];

    // Scope active 
    public function scopeActive($query) 
    {
        return $query->where('active',1);
    }

    public function scopeBasePrice($query)
    {
        $exchange_rate = floatval(Configuration::where('key', 'exchange_rate')->first()->value);
        return $this->pivot->base_price * $exchange_rate;
    }

    // Relación muchos a muchos inversa
    public function stockKeepingUnits()
    {
        return $this->belongsToMany(StockKeepingUnit::class,'service_sku_prices')->withTimestamps();
    }

    public function promotions()
    {
        return $this->belongsToMany(Promotion::class,'service_sku_promotion')->withTimestamps();
    }

    // Relación uno a muchos 
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    
    
}
