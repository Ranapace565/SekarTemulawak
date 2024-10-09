<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'harga' => $this->faker->randomFloat(2, 0, 0),
            'bahan' => fake()->text(),
            'manfaat' => fake()->text(),
            'ukuran' => fake()->text(),
            'deskripsi' => fake()->text(),
            'stok' => $this->faker->randomFloat(2, 0, 0)
        ];
    }
}
