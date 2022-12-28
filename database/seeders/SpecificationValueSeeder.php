<?php

namespace Database\Seeders;

use App\Models\SpecificationValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecificationValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specification_values = [
            [
                'specification_id' => 1,
                'name' => 'diagnóstico'
            ],
            [
                'specification_id' => 1,
                'name' => 'catálogo'
            ],
            [
                'specification_id' => 1,
                'name' => 'reprogramación'
            ],
            [
                'specification_id' => 1,
                'name' => 'manuales de servicio'
            ],
            [
                'specification_id' => 3,
                'name' => 'inglés'
            ],
            [
                'specification_id' => 3,
                'name' => 'alemán'
            ],
            [
                'specification_id' => 3,
                'name' => 'español'
            ],
            
        ];

        foreach ($specification_values as $specification_value) {
            SpecificationValue::create($specification_value);
        }
    }
}
