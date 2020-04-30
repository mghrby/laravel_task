<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Category::class, 5)->create()->each(function ($category) {
            factory(\App\Models\Product::class, 10)->create(['category_id' => $category->id]);
        });
    }
}
