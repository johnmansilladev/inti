<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Promotion;
use Illuminate\Database\Seeder;
use App\Models\StockKeepingUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $promotion = Promotion::create([
            'name' => 'Descuento 5% navidad',
            'type_promotion'=> Promotion::PERCENTAGE,
            'apply_to' => Promotion::SERVICE,
            'discount_rate' => 5,
            'date_from' => Carbon::now(),
            'date_to' => Carbon::now()->addDay(5)
        ]);

        

        $skus = StockKeepingUnit::all();
        foreach ($skus as $key => $sku) {
            foreach ($sku->services as $service) {
                $sku->promotions()->attach($promotion,['service_id'=>$service->id]);
            }
            
        }
    }
}
