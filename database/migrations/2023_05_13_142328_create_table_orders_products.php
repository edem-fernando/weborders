<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrdersProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_items', function (Blueprint $table) {
            $table->unsignedBigInteger('order');
            $table->unsignedBigInteger('product');
            $table->unsignedInteger('quant');
            $table->decimal('price_sale', 15, 2);
            $table->decimal('price_cost', 15, 2);
            $table->primary(['order', 'product']);
            $table->foreign('order')->on('orders_requests')->references('id');
            $table->foreign('product')->on('products_items')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_items');
    }
}
