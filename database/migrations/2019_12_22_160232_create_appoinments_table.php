<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppoinmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('appoinments', function (Blueprint $table) {
         $table->bigIncrements('Id');
         $table->unsignedBigInteger('IdPatient')->index();
         $table->unsignedBigInteger('IdMedicalC')->index();
         $table->unsignedBigInteger('IdDriver')->index();
         $table->unsignedBigInteger('IdUser')->index();
         $table->date('AppoinmentDate')->default(now());
         $table->string('DestName',200);
         $table->string('DestAddress',250);
         $table->string('DestPhone',50);
         $table->string('TypeVisit',100);
         $table->string('ServiceType',100);
         $table->string('SpecialistName',100);
         $table->string('SpecialTransportation',200);
         $table->datetime('PickUpTime',0);
         $table->datetime('DropOffMCTime',0);
         $table->datetime('PickUpMCTime',0);
         $table->datetime('DropOffTime',0);
         $table->string('LatitudMC',50);
         $table->string('LongitudMC',50);
         $table->string('LatitudPat',50);
         $table->string('LongitudPat',50);
         $table->decimal('DistanceToMC',10,2);
         $table->text('Notes');
         $table->integer('AmountAccomp');
         $table->boolean('Cancel');
         $table->date('OB');
         $table->date('RP');
         $table->date('CD');
         $table->date('OO');
         $table->date('RS');
         $table->timestamps();
         $table->foreign('IdMedicalC')->references('IdMedicalC')->on('medical_centers');
         $table->foreign('IdDriver')->references('Id')->on('driver_assigments');
         $table->foreign('IdPatient')->references('Id')->on('patients');
         $table->foreign('IdUser')->references('id')->on('users');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appoinments');
    }
}
