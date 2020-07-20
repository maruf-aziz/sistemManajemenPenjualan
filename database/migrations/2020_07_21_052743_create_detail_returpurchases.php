<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailReturpurchases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_returpurchases', function (Blueprint $table) {
            $table->unsignedBigInteger('retur_id');
            $table->unsignedBigInteger('product');
            $table->integer('qty');
            $table->integer('price');
            $table->timestamps();

            $table->foreign('retur_id')->references('id_retur')->on('retur_purchases');
            $table->foreign('product')->references('id_product')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_returpurchases');
    }
}
