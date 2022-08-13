<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationTripTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_trip', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ges_appoinments_id');
            $table->string('message',100);
            $table->boolean('readed')->default(0);
            $table->tinyInteger('position')->nullable();
            $table->timestamps();
            $table->foreign('ges_appoinments_id')->references('id')->on('ges_appoinments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notification_trip');
    }
}
