<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrdersRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client');
            $table->unsignedBigInteger('channel');
            $table->unsignedBigInteger('status')->nullable();
            $table->unsignedBigInteger('address')->nullable();
            $table->integer('location_delivered');
            $table->unsignedBigInteger('user_attendance')->nullable();
            $table->unsignedBigInteger('user_delivered')->nullable();
            $table->decimal('total', 15, 2)->nullable();
            $table->decimal('discount', 15, 2)->nullable();
            $table->text('description')->nullable();
            $table->dateTime('date_finalize')->nullable();
            $table->dateTime('date_send')->nullable();
            $table->dateTime('date_delivered')->nullable();
            $table->timestamps();

            $table->foreign('client')->on('clients_registers')->references('id');
            $table->foreign('address')->on('clients_address')->references('id');
            $table->foreign('user_attendance')->on('sys_users')->references('id');
            $table->foreign('user_delivered')->on('sys_users')->references('id');
            $table->foreign('channel')->on('channels_items')->references('id');
            $table->foreign('status')->on('orders_status')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_requests');
    }
}
