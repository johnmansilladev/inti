<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SpecificationGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecificationGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specification_groups = [
            [
                'name' => 'características destacadas',
                'position' => 1
            ],
            [
                'name' => 'información general',
                'position' => 2
            ],
            [
                'name' => 'actualización',
                'position' => 3
            ],
            [
                'name' => 'vehiculos compatibles',
                'position' => 4
            ],
        ];

        $categories = Category::all();

        foreach ($categories as $key => $category) {
            foreach ($specification_groups as $specification_group) {
                $category->specificationGroups()->create($specification_group);
            }
        }

        
    }
}
