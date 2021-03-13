<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=0; $i <= 30; $i++){
            Product::create([
                'title' => $faker->sentence(4),
                'slug' => $faker->slug,
                'subtitle' => $faker->sentence(6),
                'description' => $faker->text,
                'price' => $faker->numberBetween(100, 500) * 100,
                'image' => 'images/products/1.png'
            ]);
        }
    }
}
