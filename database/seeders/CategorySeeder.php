<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name'=>'agrícola','slug'=>'agricola','icon'=>'categories/agricola.svg','image'=>'categories/bg-agricola.jpg','position'=>1],
            ['name'=>'automotor','slug'=>'automotor','icon'=>'categories/automotor.svg','image'=>'categories/bg-agricola.jpg','position'=>2],
            ['name'=>'carretilla eléctrica','slug'=>'carretilla-electrica','icon'=>'categories/maquina-elevadora.svg','image'=>'categories/bg-agricola.jpg','position'=>3],
            ['name'=>'generadores','slug'=>'generadores','icon'=>'categories/generadores.svg','image'=>'categories/bg-agricola.jpg','position'=>4],
            ['name'=>'equipamiento pesado','slug'=>'equipamiento-pesado','icon'=>'categories/equipamiento-pesado.svg','image'=>'categories/bg-agricola.jpg','position'=>5],
            ['name'=>'marina','slug'=>'marina','icon'=>'categories/marina.svg','image'=>'categories/bg-agricola.jpg','position'=>6],
            ['name'=>'transmisión','slug'=>'transmision','icon'=>'categories/transmision.svg','image'=>'categories/bg-agricola.jpg','position'=>7],
            ['name'=>'camiones y camiones pesados','slug'=>'camiones-y-camiones-pesados','icon'=>'categories/camiones-pesados.svg','image'=>'categories/bg-agricola.jpg','position'=>8],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
