<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Promotion;
use App\Models\ServiceSkuPrice;
use Illuminate\Database\Seeder;
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

        

        $sku_prices = ServiceSkuPrice::all();
        foreach ($sku_prices as $key => $sku_price) {
            $promotion->serviceSkuPrices()->attach($sku_price);
        }
    }
}
