<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_table', function (Blueprint $table) {
            $table->increments('order_id');
            $table->integer('user_id');
            $table->string('user_name');
            $table->string('shop_name');
            $table->string('product_name');
            $table->string('area_name')->nullable();
            $table->string('order_qnt')->nullable();
            $table->string('size')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('price')->nullable();
            $table->string('address')->nullable();
            $table->string('status')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
