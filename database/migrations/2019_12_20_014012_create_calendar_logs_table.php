<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendar_logs', function (Blueprint $table) {
            $table->bigIncrements('IdLog');
            $table->timestamps();
            $table->string('TypeReg',100);
            $table->text('Notes');
            $table->unsignedBigInteger('IdUser');
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
        Schema::dropIfExists('calendar_logs');
    }
}
