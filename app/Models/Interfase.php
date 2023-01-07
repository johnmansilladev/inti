<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interfase extends Model
{
    use HasFactory;

    protected $guarded = ['id','active'];

    protected $casts = [
        'active' => 'boolean',
    ];

    // Relacion muchos a muchos inversa
    public function products(){
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

    // URL amigable
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
