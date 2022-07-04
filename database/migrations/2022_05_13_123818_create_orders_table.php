<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('customer_id')->unsigned();
          $table->string('name');
          $table->string('email')->nullable();
          $table->string('phone')->nullable();
          $table->string('address')->nullable();
          $table->tinyInteger('status')->default(0);
          $table->timestamp('deleted_at');
          $table->timestamps ();
          $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropForeign('customer_id');
     Schema::table('orders', function(Blueprint $table)
    {
    $table->dropForeign('orders_customer_id_foreign'); //
    });
        Schema::dropIfExists('orders');
    }
}