<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->string('MedicalNumber',30)->unique();
            $table->string('Names',200);
            $table->date('BOD');
            $table->string('NumberPhone1',30);
            $table->string('NumberPhone2',30);
            $table->string('PatientAddress',200);
            $table->string('Email',80);
            $table->string('ContactPreference',200);
            $table->string('PhysicalLimits',250)->nullable();
            $table->unsignedBigInteger('IdMedicalC')->nullable();
            $table->string('ContactPerson',250)->nullable();
            $table->string('PreferredLanguage',50);
            $table->integer('Route')->nullable();
            $table->unsignedBigInteger('patient_types');
            $table->text('Notes')->nullable();
            $table->timestamps();
            //$table->foreign('patient_types')->references('Id')->on('patient_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
