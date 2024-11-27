<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */


    // protected static ?string $password;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'username' => $this->faker->unique()->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Password default
            'is_admin' => $this->faker->boolean(5), // 5% peluang menjadi admin
            'remember_token' => Str::random(10),
        ];
    }

    // public function definition()
    // {
    //     return [
    //         'name' => $this->faker->name(),
    //         'username' => $this->faker->unique()->userName(),
    //         'email' => $this->faker->unique()->safeEmail(),
    //         'email_verified_at' => now(),
    //         'is_admin' => $this->faker->boolean(20), // 20% peluang menjadi admin
    //         'password' => bcrypt('password'), // Password default
    //         'remember_token' => Str::random(10),
    //     ];
    // }

    // $a = $a ? $a : $b; //ternari operator
    // $a =$a ?: $b; //elvis operator
    // $a ??= $b; // null coalescing operator
    /**
     * Indicate that the model's email address should be unverified.
     */

    // public function unverified(): static
    // {
    //     return $this->state(fn(array $attributes) => [
    //         'email_verified_at' => null,
    //     ]);
    // }

    // public function admin(): static
    // {
    //     return $this->state(fn(array $attributes) => [
    //         'is_admin' => true,
    //     ]);
    // }
}
