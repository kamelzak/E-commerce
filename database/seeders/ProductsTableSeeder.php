<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->faker = Faker::create();

        for($i=0; $i < 20; $i++)
        {
            Product::create([
                'title' => $this->faker->sentence(3),
                'slug' => $this->faker->slug,
                'subtitle' => $this->faker->sentence(4),
                'description' => $this->faker->text,
                'price' => $this->faker->numberBetween(15,1000) * 100,
                'photo' => 'https://via.placeholder.com/200x250'
            ])->categories()->attach([
                rand(1,5),
                rand(1,5)
            ]);
        }
    }
}
