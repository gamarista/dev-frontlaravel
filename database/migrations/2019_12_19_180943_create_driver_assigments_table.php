<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriverAssigmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_assigments', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->unsignedBigInteger('dZone')->index();
            $table->unsignedBigInteger('IdMC')->index();
            $table->unsignedBigInteger('IdVehicle')->index();
            $table->string('Driver',100);
            $table->boolean('Enable')->default(true);
            $table->string('Phone1',100);
            $table->string('Address',100);     
            $table->string('Notes',100);
            $table->timestamps();
            $table->foreign('dZone')->references('IdZone')->on('zones');
            $table->foreign('IdMC')->references('IdMedicalC')->on('medical_centers');
            $table->foreign('IdVehicle')->references('IdVehicle')->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('driver_assigments');
    }
}
