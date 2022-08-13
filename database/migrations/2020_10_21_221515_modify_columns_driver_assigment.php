<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class ModifyColumnsDriverAssigment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('driver_assigments', function (Blueprint $table) {
    
            DB::statement(' ALTER TABLE `driver_assigments` 
                            ALTER `dZone` DROP DEFAULT,  
                            ALTER `IdMC` DROP DEFAULT,
                            ALTER `IdVehicle` DROP DEFAULT,
                            ALTER `Phone1` DROP DEFAULT,
                            ALTER `Address` DROP DEFAULT,
                            ALTER `Notes` DROP DEFAULT;');

            DB::statement(' ALTER TABLE `driver_assigments`
                            CHANGE COLUMN `dZone` `dZone` BIGINT(20) UNSIGNED NULL AFTER `Id`,
                            CHANGE COLUMN `IdMC` `IdMC` BIGINT(20) UNSIGNED NULL AFTER `dZone`,
                            CHANGE COLUMN `IdVehicle` `IdVehicle` BIGINT(20) UNSIGNED NULL AFTER `IdMC`,
                            CHANGE COLUMN `Phone1` `Phone1` VARCHAR(100) NULL  AFTER `Enable`,
                            CHANGE COLUMN `Address` `Address` VARCHAR(100) NULL AFTER `Phone1`,
                            CHANGE COLUMN `Notes` `Notes` VARCHAR(100) NULL  AFTER `Address`;
                        ');

           
         
         
          
                    
           
          
           
           
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {  DB::statement(' ALTER TABLE `driver_assigments` CHANGE COLUMN `dZone` `dZone` BIGINT(20) UNSIGNED NULL AFTER `Id`');
        DB::statement('ALTER TABLE `driver_assigments`  ALTER `dZone` DROP DEFAULT;');
    }
}
