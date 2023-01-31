<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specification extends Model
{
    use HasFactory;

    protected $guarded = ['id','active'];

    protected $casts = [
        'active' => 'boolean',
    ];

    // Relacion uno a muchos inversa
    public function specificationGroup()
    {
        return $this->belongsTo(SpecificationGroup::class);
    }

    // Relación uno a muchos
    public function specificationValues()
    {
        return $this->hasMany(SpecificationValue::class);
    }
}
