<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAdminCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_admin_centers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('IdUser')->index();
            $table->unsignedBigInteger('IdMC')->index();
            $table->timestamps();
            $table->foreign('IdMC')->references('IdMedicalC')->on('medical_centers');
            $table->foreign('IdUser')->references('Id')->on('users');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_admin__centers');
    }
}
