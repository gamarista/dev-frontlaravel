<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_centers', function (Blueprint $table) {
            $table->bigIncrements('IdMedicalC');
            $table->string('Name',200);
            $table->string('NickName',100);
            $table->string('NumberPhone',100);
            $table->string('AddressMedicalC',250);
            $table->string('LatitudCenter',50);
            $table->string('LongitudCenter',50);
            $table->string('Specialty',100);
            $table->string('NameDr',150);
            $table->string('NumberPhone1',50)->nullable;
            $table->string('NumberPhone2',50)->nullable;
            $table->string('FaxNumber',50)->nullable;
            $table->string('Email',50)->nullable;       
            $table->string('Street',200)->nullable;        
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
        Schema::dropIfExists('medical_centers');
    }
}
