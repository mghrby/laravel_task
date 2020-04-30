<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name'          =>  'Xbox',
            'category_id'   =>  1,
            'description'   =>  'Xbox',
        ]);

        factory('App\Models\Product', 1)->create();
    }
}
