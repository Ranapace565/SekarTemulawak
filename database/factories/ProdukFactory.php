<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->word(),
            'slug' => $this->faker->unique()->slug(),
            'bahan' => $this->faker->word(),
            'manfaat' => $this->faker->sentence(),
            'ukuran' => $this->faker->randomElement(['S', 'M', 'L', 'XL']),
            'deskripsi' => $this->faker->paragraph(),
            'stok' => $this->faker->numberBetween(10, 100),
            'harga' => $this->faker->numberBetween(10000, 500000),
            // 'status' => $this->faker->boolean(),
            'image' => 'default.jpg',
            // 'dibuat' => now(),
        ];
    }
}
