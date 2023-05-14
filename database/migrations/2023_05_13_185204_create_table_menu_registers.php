<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMenuRegisters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_registers', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_published')->nullable();
            $table->boolean('active')->default(1);
            $table->unsignedBigInteger('user_created');
            $table->timestamps();
            
            $table->foreign('user_created')->on('sys_users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_registers');
    }
}
