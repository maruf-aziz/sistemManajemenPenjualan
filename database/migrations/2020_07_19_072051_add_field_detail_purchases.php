<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldDetailPurchases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_purchases', function (Blueprint $table) {
            //
            $table->dropColumn('unit');
            $table->dropColumn('value');

            $table->unsignedBigInteger('unit_id')->after('amount');
            $table->integer('disc')->after('purchase_id');

            $table->foreign('unit_id')->references('id_unit')->on('units');
            
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
