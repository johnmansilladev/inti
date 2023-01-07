<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\StockKeepingUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSkuPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skus = StockKeepingUnit::all();
        $services = Service::all();
        $prices = [79.90,89.90,99.90,119.90,129.90,149.90];
        foreach ($skus as $sku) {
            foreach ($services as $key => $service) {
                $sku->services()->attach($service,[
                    'cost_price' => 0,
                    'markup' => 0,
                    'base_price' => $prices[$key],
                    'dcto' => 20,
                    'sale_price' => $prices[$key] - (($prices[$key]*20)/100)
                ]);
            }
        }
    }
}
