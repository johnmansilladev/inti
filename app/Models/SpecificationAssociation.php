<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SpecificationAssociation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function specification()
    {
        return $this->belongsTo(Specification::class);
    }

    public function specificationValue()
    {
        return $this->belongsTo(SpecificationValue::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function stockKeepingUnit()
    {
        return $this->belongsTo(StockKeepingUnit::class);
    }

}
