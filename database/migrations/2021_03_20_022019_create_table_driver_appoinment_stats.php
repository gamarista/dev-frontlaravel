<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTableDriverAppoinmentStats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_appoinment_stats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('medical_centers_id');
            $table->timestamp('start_job');
            $table->timestamp('end_job');
            $table->tinyInteger('total_trips')->nullable();
            $table->tinyInteger('completed_trips')->nullable();
            $table->tinyInteger('pending_trips')->nullable();
            $table->tinyInteger('ob')->nullable();
            $table->tinyInteger('dp')->nullable();
            $table->tinyInteger('cd')->nullable();
            $table->timestamps();

            $table->foreign('driver_id')->references('Id')->on('driver_assigments');
            $table->foreign('medical_centers_id')->references('IdMedicalC')->on('medical_centers');
        });

        // DB::statement('ALTER TABLE driver_appoinment_stats MODIFY COLUMN start_job TIMESTAMP NOT NULL');
        // DB::statement('ALTER TABLE driver_appoinment_stats MODIFY COLUMN end_job TIMESTAMP NOT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('driver_appoinment_stats');
    }
}
