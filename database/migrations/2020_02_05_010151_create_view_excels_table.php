<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateViewExcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW ViewExcel AS SELECT pa.Names,DATE_FORMAT(pa.BOD,'%m/%d/%Y') Dateofbirth,pa.NumberPhone1,pa.NumberPhone2,pa.PatientAddress,DATE_FORMAT(ap.PickUpTime,'%h:m% %p') Time,mc.AddressMedicalC,mc.Name,ap.SpecialistName,mc.NumberPhone,ap.TypeVisit,ap.SpecialTransportation,DATE_FORMAT(ap.PickUpTime,'%m/%d/%Y') dropoff FROM appoinments ap INNER JOIN patients pa ON (ap.Id=pa.Id) INNER JOIN medical_centers mc ON (ap.Id = mc.IdMedicalC)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW ViewExcel");
    }
}
