<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    
    protected $guarded = ['id','active'];

    protected $casts = [
        'active' => 'boolean',
    ];

    //Relacion uno a muchos
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // URL amigable
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
