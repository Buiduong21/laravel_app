<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavotitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favotites', function (Blueprint $table) {
           $table->integer('customer_id')->unsigned();
           $table->integer('product_id')->unsigned();
           $table->foreign('customer_id')->references('id')->on('customers');
           $table->foreign('product_id')->references('id')->on('products');
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
    Schema :: table('favotites',function(Blueprint $table){
    $table->dropForeign('favotites_customer_id_foreign');
    $table->dropForeign('favotites_product_id_foreign');
    });

        Schema::dropIfExists('favotites');
    }
}