<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retur_sales', function (Blueprint $table) {
            $table->bigIncrements('id_retur');
            $table->unsignedBigInteger('sale_id');
            $table->string('desc');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sale_id')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retur_sales');
    }
}
