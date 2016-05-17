<?php

use Illuminate\Database\Seeder;
use DeliveryApp\Models\Category;
use DeliveryApp\Models\Product;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        Category::truncate();

        factory(Category::class, 5)->create()->each(function($category) {
            for($i = 0; $i < 5; $i++) {
                $category->products()->save(factory(Product::class)->make());
            }
        });
    }
}
