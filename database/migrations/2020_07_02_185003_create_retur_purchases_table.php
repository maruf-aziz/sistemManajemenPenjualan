<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retur_purchases', function (Blueprint $table) {
            $table->bigIncrements('id_retur');
            $table->unsignedBigInteger('purchase_id');
            $table->string('desc');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('purchase_id')->references('id')->on('purchases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retur_purchases');
    }
}
