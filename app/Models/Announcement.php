<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $guarded = ['id','active'];

    const INFO = 1;
    const TIMER = 2;

    public function scopeActive($query)
    {
        return $query->where('active',true)->where(function($query){
            $query->where([['date_from', '<=', now()],['date_to', '>=', now()]]);
        })->orWhere(function($query){
            $query->whereNull('date_from')
                ->whereNull('date_to');
        })->orderBy('position','desc');
    }

}
