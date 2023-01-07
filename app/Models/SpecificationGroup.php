<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecificationGroup extends Model
{
    use HasFactory;

    protected $guarded = ['id','active'];

    protected $casts = [
        'active' => 'boolean',
    ];

    // Relacion uno a muchos inversa
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relación uno a muchos
    public function specifications() 
    {
        return $this->hasMany(Specification::class);
    }
}
