<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTmpAppoinmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmp_appoinments', function (Blueprint $table) {
           $table->id();
           $table->unsignedBigInteger('IdMC')->index()->nullable();
           $table->time('Time')->nullable();
           $table->date('Date')->nullable();
           $table->string('LastName',100)->nullable();
           $table->string('FirstName',100)->nullable();
           $table->string('MiddleName',100)->nullable();
           $table->string('PatNumber',100)->nullable();
           $table->date('DOB')->nullable();
           $table->string('AddressPatient',250)->nullable();
           $table->string('City',200)->nullable();
           $table->string('State',200)->nullable();
           $table->string('ZipCode',100)->nullable();
           $table->string('PhoneNumber',100)->nullable();
           $table->string('MobilNumber',100)->nullable();
           $table->string('AddressDestination',250)->nullable();
           $table->string('ConsultDestination',250)->nullable();
           $table->string('Driver',200)->nullable();
           $table->string('PhoneCompanion',100)->nullable();
           $table->string('Companion',200)->nullable();
           $table->string('TripType',5)->default('PU');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tmp_appoinments');
    }
}
