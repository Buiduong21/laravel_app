<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
           $table->integer('order_id')->unsigned();
           $table->integer('product_id')->unsigned();
           $table->integer('quantity')->unsigned();
           $table->float('price');
           $table->foreign('order_id')->references('id')->on('orders');
           $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('order_details', function (Blueprint $table){
        $table->dropForeign('order_details_order_id_foreign');
        $table->dropForeign('order_details_product_id_foreign');
        });
        Schema::dropIfExists('order_details');
    }
}