<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id','active'];
    protected $withCount = ['reviews'];

    protected $casts = [
        'active' => 'boolean',
    ];

    // Rating de los productos
    protected function rating(): Attribute 
    {
        return Attribute::make(
            get: fn () => ($this->reviews_count) ? number_format(round($this->reviews->avg('rating'),1),1) : number_format(5,1)
        );
    }
    
    // Scopes
    public function scopeLike($query,$field,$value) {
        return $query->where($field, 'LIKE', "%$value%");
    }

    public function scopeActive($query) 
    {
        return $query->where('active',1);
    }

    public function scopeFirstSku($query)
    {
        return $this->stockKeepingUnits()->active()->orderBy('release_date', 'desc')->first();
    }

    public function scopeWhereSkuSlug($query,$slug) 
    {
        return $this->stockKeepingUnits()
                    ->where('slug',$slug)
                    ->active()
                    ->first();
    }

    public function scopeFirstSkuImage($query)
    {
        return $this->stockKeepingUnits()
                    ->orderBy('release_date', 'desc')
                    ->first()
                    ->images()->first();
    }

    public function scopeSkuOrder($query) 
    {
        return $query->with(['stockKeepingUnits' => function ($q) {
            $q->orderBy('release_date','desc');
        }]);
    }

    // Relacion uno a muchos inversa
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relacion uno a muchos
    public function stockKeepingUnits()
    {
        return $this->hasMany(StockKeepingUnit::class)->orderBy('release_date','desc');
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function specificationAssociations()
    {
        return $this->hasMany(SpecificationAssociation::class);
    }

    // Relacion muchos a muchos
    public function collections()
    {
        return $this->belongsToMany(Collection::class)->withTimestamps();
    }

    public function interfases()
    {
        return $this->belongsToMany(Interfase::class)->withTimestamps();
    }
    

    // URL amigable
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
