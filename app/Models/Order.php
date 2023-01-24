<?php

namespace App\Models;

use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    // Estados de orden
    const PENDING = 1;
    const RECEIVED = 2;
    const IN_PROCESS = 3;
    const DELIVERED = 4;
    const CANCELLED = 5;

    // Medios de contacto
    const WHATSAPP = 'whatsapp';
    const EMAIL = 'email';
    const FACEBOOK = 'facebook';
    const SKYPE = 'skype';
    const TELEGRAM = 'telegram';
    const WECHAT = 'wechat';

    protected $guarded = ['id','status'];


    //Relacion uno a muchos
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    // URL amigable
    public function getRouteKeyName()
    {
        return 'nro_order';
    }
}
