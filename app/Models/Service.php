<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relacion muchos a muchos inversa
    public function stockKeepingUnits(){
        return $this->belongsToMany(StockKeepingUnit::class,'service_prices ')->withTimestamps();
    }

}
