<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 0, 100),
            'categoryId' => function () {
                return \App\Models\Categories::factory()->create()->id;
            },
            'supplierId' => function () {
                return \App\Models\Suppliers::factory()->create()->id;
            },
        ];
    }
}
