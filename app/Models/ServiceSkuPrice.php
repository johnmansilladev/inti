<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceSkuPrice extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // A quien aplica el precio 
    const PRODUCT = 1;
    const SERVICE = 2;

    // public function promotions() 
    // {
    //     return $this->belongsToMany(Promotion::class,'service_sku_promotion')->withTimestamps();
    // }
    
    
}
