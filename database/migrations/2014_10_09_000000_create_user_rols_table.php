<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_rols', function (Blueprint $table) {
            $table->bigIncrements('IdRole');
            $table->string('Name',100);
            $table->boolean('Opc1');
            $table->boolean('Opc2');
            $table->boolean('Opc3');
            $table->boolean('Opc4');
            $table->boolean('Opc5');
            $table->boolean('Opc6');
            $table->boolean('Opc7');
            $table->boolean('Opc8');
            $table->boolean('Opc9');
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
        Schema::dropIfExists('user_rols');
    }
}
