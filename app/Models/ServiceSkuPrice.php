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
    

    //Scope details de productos
    // public function scopeDetailSku($query,$sku_id,$service_id)
    // {
    //     return $query->join('stock_keeping_units','service_sku_prices.stock_keeping_unit_id','=','stock_keeping_units.id')
    //                 ->join('services','service_sku_prices.service_id','=','')    
    //     ;
    // }
    
}
