<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $guarded = ['id','active'];

    protected $casts = [
        'active' => 'boolean',
    ];

    // Tipo de promociones
    const PERCENTAGE = 1;
    const FIXED_AMOUNT = 2;

    // A quien aplica a la promocion
    const PRODUCT = 1;
    const SERVICE = 2;

    // Relación muchos a muchos inversa
    public function stockKeepingUnits()
    {
        return $this->belongsToMany(StockKeepingUnit::class,'service_sku_promotion')->withTimestamps();
    }

    public function services()
    {
        return $this->belongsToMany(Service::class,'service_sku_promotion')->withTimestamps();
    }


}
