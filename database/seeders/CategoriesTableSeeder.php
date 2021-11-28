<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'High tech',
            'slug' => 'high-tech'
        ]);

        Category::create([
            'name' => 'Books',
            'slug' => 'books'
        ]);

        Category::create([
            'name' => 'Fourniture',
            'slug' => 'fourniture'
        ]);

        Category::create([
            'name' => 'Gaming',
            'slug' => 'gaming'
        ]);

        Category::create([
            'name' => 'Nutrition',
            'slug' => 'nutrition'
        ]);
    }
}
