<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Service;
use App\Models\StockKeepingUnit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function metadata(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }

    // Relacion uno a muchos inversa
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function stockKeepingUnit()
    {
        return $this->belongsTo(StockKeepingUnit::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
