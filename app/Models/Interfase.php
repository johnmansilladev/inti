<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interfase extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relacion muchos a muchos inversa
    public function products(){
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
