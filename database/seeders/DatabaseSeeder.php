<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CurrencyType;
use App\Models\Specification;
use App\Models\SpecificationValue;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(SliderSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(InterfaseSeeder::class);
        $this->call(CollectionSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(CurrencyTypeSeeder::class);
        $this->call(ServiceStockKeepingUnitSeeder::class);
        $this->call(FieldTypeSeeder::class);
        $this->call(SpecificationGroupSeeder::class);
        $this->call(SpecificationSeeder::class);
        $this->call(SpecificationValueSeeder::class);
        $this->call(SpecificationAssociationSeeder::class);
    }
}
