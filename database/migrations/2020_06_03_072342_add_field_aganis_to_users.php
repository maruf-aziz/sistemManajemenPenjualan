<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldAganisToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->text('description')->nullable()->after('password');
            $table->char('phone', 13)->after('description');
            $table->string('address')->nullable()->after('phone');
            $table->string('first_name', 50)->nullable()->after('address');
            $table->string('last_name', 50)->nullable()->afrer('first_name'); //salah after
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
