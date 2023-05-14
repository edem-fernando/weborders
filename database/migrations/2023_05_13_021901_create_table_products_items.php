<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProductsItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category');
            $table->string('name', 255);
            $table->string('alias', 255)->nullable();
            $table->boolean('active')->default(1)->nullable();
            $table->decimal('price_sale', 15, 2)->nullable();
            $table->decimal('price_cost', 15, 2)->nullable();
            $table->string('thumb', 255)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('category')->on('products_categories')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_items');
    }
}
