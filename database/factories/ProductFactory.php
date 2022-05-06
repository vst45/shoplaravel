<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

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

        // Category::get()->random()->id
        return [
            'name' => trim(ucwords($this->faker->sentence(random_int(1, 3), false)), "."),
            'description' => $this->faker->paragraph(4, true),
            'slug' => '-',
            'category_id' => Category::whereNotNull('category_id')->get()->random()->id,
            'brand_id' => random_int(1, 25),
            'price' => random_int(12000, 25000),
            'sale_percent' => random_int(0, (random_int(0, 10) == 9? 30 : 0)),
            'viewed' => random_int(3, 2000),
            'is_new' => (random_int(1, 6) == 3? 1 : 0),
            'is_hot' => (random_int(1, 6) == 3? 1 : 0),
            'is_bestseller' => (random_int(1, 6) == 3? 1 : 0),
        ];
    }
}
