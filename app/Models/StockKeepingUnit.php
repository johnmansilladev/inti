<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StockKeepingUnit extends Model
{
    use HasFactory;

    protected $guarded = ['id','active'];

    protected $casts = [
        'active' => 'boolean',
    ];

    // Scope active 
    public function scopeActive($query) 
    {
        return $query->where('active',1);
    }

    public function scopeFirstServicePriceBase() 
    {
        $base_price = $this->services()->active()->orderBy('position','asc')->first()->pivot->base_price;
        $exchange_rate = floatval(Configuration::where('key','exchange_rate')->first()->value);

        return $base_price * $exchange_rate;
    }

    public function scopeFirstService($query)
    {
        return $this->services()->active()->orderBy('position','asc')->first();
    }

    public function scopeWhereServiceSlug($query,$slug)
    {
        return $this->services()
                    ->where('slug',$slug)
                    ->active()
                    ->first();
    }

    // Scope para validar si existe promociones del sku y servicio
    public function scopeHasPromotionsService($query,$service_id) 
    {
        $promotions = $this->promotions()
                            ->where([['date_from', '<=', now()],['date_to', '>=', now()]])
                            ->where('apply_to',2)
                            ->where('active',true)
                            ->latest()
                            ->wherePivot('service_id',$service_id)->get();

        return $promotions->count() > 0;
    }

     // Scope para obtener la promocion del sku
    public function scopeDiscountedPriceService($query,$service_id)  
    {
        return $this->promotions()
                    ->where([['date_from', '<=', now()],['date_to', '>=', now()]])
                    ->where('apply_to',2)
                    ->where('active',true)
                    ->latest()
                    ->wherePivot('service_id',$service_id)->first();
    }

    // Relación muchos a muchos
    public function services()
    {
        return $this->belongsToMany(Service::class,'service_sku_prices')
                    ->withPivot('cost_price','markup','base_price')
                    ->wherePivot('apply_to',2)
                    ->withTimestamps();
    }

    public function promotions()
    {
        return $this->belongsToMany(Promotion::class,'service_sku_promotion')
                    ->withPivot('service_id')
                    ->withTimestamps();
    }


    // Relación uno a muchos inversa
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relación uno a muchos polimorfica
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function videos()
    {
        return $this->morphMany(Video::class, 'videoable');
    }

    // Relación uno a muchos
    public function specificationAssociations()
    {
        return $this->hasMany(SpecificationAssociation::class);
    }
    
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    // URL amigable
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
