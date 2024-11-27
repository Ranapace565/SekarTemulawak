<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'jumlah' => $this->faker->numberBetween(1, 10),
            'user_id' => User::factory(),
            'produk_id' => Produk::factory(),
        ];
    }
}
