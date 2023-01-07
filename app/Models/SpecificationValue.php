<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecificationValue extends Model
{
    use HasFactory;

    protected $guarded = ['id','active'];

    protected $casts = [
        'active' => 'boolean',
    ];
}
