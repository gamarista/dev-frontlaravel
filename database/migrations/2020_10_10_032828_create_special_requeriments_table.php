<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSpecialRequerimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_requeriments', function (Blueprint $table) {
            $table->id();
            $table->string('requeriment');
            $table->timestamps();
        });
        $data = [
            [ 'requeriment'=> 'wheelchair'],
            [ 'requeriment'=> 'walker'],
            [ 'requeriment'=> 'companion'],
            [ 'requeriment'=> 'Vision impaired'],
            [ 'requeriment'=> 'Alzheimer'],
            [ 'requeriment'=> 'Animal service'],
            [ 'requeriment'=> 'Hearing impaired'],
            [ 'requeriment'=> 'Oxygen'],
            [ 'requeriment'=> 'Mute'],
            
            //...
        ];
        DB::table('special_requeriments')->insert($data);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('special_requeriments');
    }
}
