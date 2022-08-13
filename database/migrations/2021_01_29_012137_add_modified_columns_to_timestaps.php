<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddModifiedColumnsToTimestaps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       

            DB::statement('ALTER TABLE ges_appoinments MODIFY COLUMN CD TIMESTAMP  NULL');
            DB::statement('ALTER TABLE ges_appoinments MODIFY COLUMN OO TIMESTAMP  NULL');
            DB::statement('ALTER TABLE ges_appoinments MODIFY COLUMN RS TIMESTAMP  NULL');
            DB::statement('ALTER TABLE ges_appoinments MODIFY COLUMN OB TIMESTAMP  NULL');
            DB::statement('ALTER TABLE ges_appoinments MODIFY COLUMN RP TIMESTAMP  NULL');
    
  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
