<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Patients;
use App\Patient_type;
use Carbon\Carbon;



class AddDummyPatient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            //$patientType = Patient_type::where('id', '>=', 0)->first();
            $patient = new Patients;
            $patient->Names = "Patient Zero";
            $patient->MedicalNumber = "PTZ-00000000";
            $patient->BOD = Carbon::today()->format('Y-m-d');
            $patient->NumberPhone1 = "+1 311 111 111";
            $patient->NumberPhone2 = "+1 311 111 111";
            $patient->ContactPreference = "+1 311 111 111";
            $patient->PatientAddress = "3170 SW 16th St Miami, FL 33145";
            $patient->Email = "patientzero@yomail.com";
            $patient->patient_types = 1;
            $patient->PreferredLanguage = "English";
            $patient->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
