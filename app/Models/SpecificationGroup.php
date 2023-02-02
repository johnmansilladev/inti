<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SpecificationGroup extends Model
{
    use HasFactory;

    protected $guarded = ['id','active'];

    protected $casts = [
        'active' => 'boolean',
    ];

    // muchos a muchos inversa
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    // Relación uno a muchos
    public function specifications() 
    {
        return $this->hasMany(Specification::class);
    }

}
