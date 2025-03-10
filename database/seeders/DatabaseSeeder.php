<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $rana = User::create([
        //     'name' => 'Rana',
        //     'username' => 'Rana',
        //     'email' => 'asfsa@gmail.com',
        //     'email_verified_at' => 'now',
        //     'password' => Hash::make('pass'),
        //     'remember_token' => Str::random(10)
        // ]);

        // $this->call([CategorySeeder::class, UserSeeder::class]);
        // Post::factory(100)->recycle([
        //     Category::all(),
        //     User::all()
        // ])->create();

        $this->call([
            // UserSeeder::class,
            // ProdukSeeder::class,
            CartSeeder::class,
        ]);
    }
}
