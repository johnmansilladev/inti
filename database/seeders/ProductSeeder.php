<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use App\Models\StockKeepingUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(100)->create()->each(function(Product $product){
            StockKeepingUnit::factory(5)->create([
                'product_id' => $product->id,
            ])->each(function(StockKeepingUnit $StockKeepingUnit) {
                for ($i=0; $i < 7; $i++) { 
                    $position = $i+1;
                    Image::create([
                        'imageable_id' => $StockKeepingUnit->id,
                        'url' => "products/product-$position.png",
                        'imageable_type' => StockKeepingUnit::class,
                        'position' => $position
                    ]);
                }
            });
        });
    }
}
