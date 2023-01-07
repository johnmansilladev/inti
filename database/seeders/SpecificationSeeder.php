<?php

namespace Database\Seeders;

use App\Models\SpecificationGroup;
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
                'field_type_id' => 1,
                'name' => 'tipo de software',
                'position' => 1,
                'required' => true
            ],
            [
                'field_type_id' => 1,
                'name' => 'marca',
                'position' => 2,
                'required' => true
            ],
            [
                'field_type_id' => 1,
                'name' => 'interface',
                'position' => 3,
                'required' => true
            ],
            [
                'field_type_id' => 1,
                'name' => 'sistema operativo',
                'position' => 4,
                'required' => true
            ],
            [
                'field_type_id' => 1,
                'name' => 'idioma',
                'position' => 5,
                'required' => true
            ],
            [
                'field_type_id' => 1,
                'name' => 'tamaño',
                'position' => 6,
                'required' => true
            ],
        ];

        $specification_groups = SpecificationGroup::all();

        foreach ($specification_groups as $specification_group) {
            foreach ($specifications as $specification) {
                $specification_group->specifications()->create($specification);
            }
        }
    }
}
