<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $guarded = ['id','active'];

    protected $casts = [
        'active' => 'boolean',
    ];

    // Relacion uno a muchos inversa
    public function clustered()
    {
        return $this->belongsTo(Collection::class,'cluster_id');
    }
}
