<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\Category;
use Faker\Generator as Faker;



$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'          =>  $faker->productName,
        'category_id'   =>  NULL,
        'description'   =>  $faker->paragraph,
    ];
});
