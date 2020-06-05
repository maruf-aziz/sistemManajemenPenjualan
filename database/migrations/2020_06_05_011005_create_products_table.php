<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id_product');
            $table->string('name_product');
            $table->integer('price');
            $table->unsignedBigInteger('unit_id');
            $table->integer('stock');
            $table->unsignedBigInteger('brand_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('unit_id')->references('id_unit')->on('units');
            $table->foreign('brand_id')->references('id_brands')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
