<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->sentence(2);
        $category = Category::all()->random();
        $brand = Brand::all()->random();

        return [
            'name' => $name,
            'category_id' => $category->id,
            'brand_id' => $brand->id,
            'slug' => Str::slug($name),
            'description' => $this->faker->paragraph(10),
            'description_short' => $this->faker->text(200),
            'release_date' => $this->faker->dateTime(),
        ];
    }
}
