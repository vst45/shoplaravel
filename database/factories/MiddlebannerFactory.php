<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Middlebanner>
 */
class MiddlebannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => trim(ucwords($this->faker->sentence(random_int(2, 4), false)), "."),
            'slogan' => trim(ucwords($this->faker->sentence(random_int(2, 4), false)), "."),
            'category_id' => Category::get()->random()->id,
        ];
    }
}
