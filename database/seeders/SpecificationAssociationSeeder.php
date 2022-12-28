<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Specification;
use App\Models\SpecificationAssociation;
use App\Models\SpecificationValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecificationAssociationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $products = Product::all();
        $specifications = Specification::whereIn('id',[1,3])->get();
        $specification_value1 = SpecificationValue::where('specification_id',1)
                                                    ->get()
                                                    ->random();

        $specification_value2 = SpecificationValue::where('specification_id',3)
        ->get()
        ->random();

        foreach ($products as $product) {
            foreach ($specifications as $specification) {
                if ($specification->id == 1) {
                    SpecificationAssociation::create([
                        'specification_id' => $specification->id,
                        'specification_value_id' =>  $specification_value1->id,
                        'product_id' =>   $product->id
                    ]);
                } else {
                    SpecificationAssociation::create([
                        'specification_id' => $specification->id,
                        'specification_value_id' =>  $specification_value2->id,
                        'product_id' =>   $product->id
                    ]);
                }
            }
        }
    }
}
