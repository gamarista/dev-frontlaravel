<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeaturesToGesAppoinments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ges_appoinments', function (Blueprint $table) {
            $table->string('drivercolor', 20)->nullable(); //->after('durationmin');
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
            //
        });
    }
}
