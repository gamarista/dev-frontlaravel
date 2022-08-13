<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnSpecialRequerimentsOnSpecialRequeriment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ges_appoinments', function (Blueprint $table) {
            $table->json('special_requeriment')->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ges_appoinments', function (Blueprint $table) {
            $table->dropColumn('special_requeriment');
        });
    }
}
