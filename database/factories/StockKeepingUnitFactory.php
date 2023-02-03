<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StockKeepingUnit>
 */
class StockKeepingUnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->sentence(3);
        return [
            'name' => $name,
            'description' => $this->faker->paragraph(2),
            'slug' => Str::slug($name),
            'release_date' => $this->faker->date()
        ];
    }
}
