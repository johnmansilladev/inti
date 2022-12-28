<?php

namespace Database\Seeders;

use App\Models\Collection;
use App\Models\Product;
use App\Models\StockKeepingUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collections = [
            [
                'name'=> "super ofertas del año",
            ],
            [
                'name'=> "ultimas actualizaciones",
            ],
            [
                'name'=> "lo mas vendido en perú",
            ],
        ];

       

        foreach ($collections as $icollection) {
           
            $collection = Collection::create($icollection);
            for ($i=0; $i < 10; $i++) { 
                $product = Product::all()->random();
                $product->collections()->attach($collection);
            }
           
        }
    }
}
