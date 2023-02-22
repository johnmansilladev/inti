<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    // Estados de orden
    const PENDING = 'pending';
    const PAID = 'paid';
    const CANCELLED = 'cancelled';

    // Medios de contacto
    const WHATSAPP = 'whatsapp';
    const EMAIL = 'email';
    const FACEBOOK = 'facebook';
    const SKYPE = 'skype';
    const TELEGRAM = 'telegram';
    const WECHAT = 'wechat';

    protected $guarded = ['id','payment_id','status'];


    protected function total(): Attribute 
    {
        return Attribute::make(
            get: function () {
                $totalPrice = 0;

                foreach ($this->orderDetails as $detail) {
                    $totalPrice += $detail->qty * $detail->price_sale;
                }

                return $totalPrice;
            }
        );
    }

    //Relacion uno a muchos
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function historyOrders()
    {
        return $this->hasMany(HistoryOrder::class);
    }

    //Relacion uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    

    // URL amigable
    public function getRouteKeyName()
    {
        return 'nro_order';
    }
}
