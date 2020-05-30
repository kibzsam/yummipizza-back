<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    // public function run()
    // {

    //     $faker = \Faker\Factory::create();

    //     // Create 10 product records
    //     $filePath = storage_path('images');
    //     for ($i = 0; $i < 10; $i++) {
    //         Product::create([
    //             'title' => $faker->title,
    //             'description' => $faker->paragraph,
    //             'price' => $faker->randomNumber(2),
    //             'availability' => $faker->boolean(50),
    //             'product_image' => $faker->image('public/storage/images', 640, 480, null, false)
    //         ]);
    //     }
    // }
    public function run()
    {

        factory(App\Product::class, 10)->create();
    }
}
