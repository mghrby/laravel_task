<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('products')) {

            Schema::create('products', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('category_id')->nullable();
                $table->string('name')->nullable();
                $table->text('description')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });

            Schema::table('products', function(Blueprint $table) {
                $table->foreign('category_id')->references('id')
                    ->on('categories')
                    ->onDelete('cascade');
            });

        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
