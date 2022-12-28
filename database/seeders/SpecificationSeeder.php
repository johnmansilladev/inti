<?php

namespace Database\Seeders;

use App\Models\Specification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specifications = [
            [
                'specification_group_id' => 1,
                'field_type_id' => 1,
                'name' => 'tipo de software',
                'filter' => true,
            ],
            [
                'specification_group_id' => 1,
                'field_type_id' => 1,
                'name' => 'sistema operativo',
            ],
            [
                'specification_group_id' => 1,
                'field_type_id' => 1,
                'filter' => true,
                'name' => 'idioma',
            ],
            [
                'specification_group_id' => 1,
                'field_type_id' => 1,
                'name' => 'tamaño',
            ],
        ];

        foreach ($specifications as $specification) {
            Specification::create($specification);
        }
    }
}
