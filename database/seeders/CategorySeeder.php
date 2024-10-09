<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory(10)->create();
        //ke model
        Category::create([
            'name' => 'Web Sekar',
            'slug' => 'Web-Sekar',

        ]);

        Category::create([
            'name' => 'Web Temulawak',
            'slug' => 'Web-Temulawak',

        ]);
    }
}
