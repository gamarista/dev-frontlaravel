<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnsApptsOnGesAppoinment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ges_appoinments', function (Blueprint $table) {
            $table->string('attention_type',20)->nullable();
            $table->string('outside_center_name',50)->nullable();
            $table->string('outside_center_phone',20)->nullable();
            $table->string('outside_doctor_resource',30)->nullable();
            $table->string('outside_motive',30)->nullable();
            $table->string('notes')->nullable();
            $table->string('outside_motive_details')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('columns_appts_on_ges_appoinment');
    }
}
