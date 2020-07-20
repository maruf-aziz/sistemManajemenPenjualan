<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailRetursales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_retursales', function (Blueprint $table) {
            $table->unsignedBigInteger('retur_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('qty');
            $table->integer('price');

            $table->foreign('retur_id')->references('id_retur')->on('retur_sales');
            $table->foreign('product_id')->references('id_product')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_retursales');
    }
}
