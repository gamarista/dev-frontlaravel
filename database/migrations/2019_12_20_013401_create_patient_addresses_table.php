<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_addresses', function (Blueprint $table) {
            $table->bigIncrements('IdDir');
            $table->string('MedicalNumber',30)->index();
            $table->string('Address',250);
            $table->string('LongitudPatient',50);
            $table->string('LatitudPatient',50);
            $table->boolean('UsualAddress');
            $table->timestamps();
            $table->foreign('MedicalNumber')->references('MedicalNumber')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_addresses');
    }
}
