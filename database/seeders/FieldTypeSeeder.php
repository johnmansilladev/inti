<?php

namespace Database\Seeders;

use App\Models\FieldType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FieldTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $field_types = [
            [
                'type' => 'Text'
            ],
            [
                'type' => 'Multi-Line Text'
            ],
            [
                'type' => 'Number'
            ],
            [
                'type' => 'Combo'
            ],
            [
                'type' => 'Radio'
            ],
            [
                'type' => 'Checkbox'
            ],
        ];
        
        foreach ($field_types as $field_type) {
            FieldType::create($field_type);
        }
    }
}
