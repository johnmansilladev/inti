<?php

namespace Database\Seeders;


use App\Models\SectionQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectionQuestions = [
            [
                'name' => 'información de compra',
                'position' => 1,
            ],
            [
                'name' => 'información de pago',
                'position' => 2,
            ],
        ];

        foreach ($sectionQuestions as $key => $sectionQuestion) {
            SectionQuestion::create($sectionQuestion);
        }
    }
}
