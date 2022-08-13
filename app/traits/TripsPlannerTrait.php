<?php

namespace App\traits;

use App\ges_appoinments;
use App\Patients;
use App\ParamsTimeFilter;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

trait TripsPlannerTrait
{

    /*
    function getCommonData($request){

        $sort =  $request->get('sort_by');
        $params = [
            'driver' =>  $request->get('driver'),
            'center' =>  $request->get('center'),
            'patient_name' => $request->get('patient_name'),
            'appoinment' =>  $request->get('appoinment'),
            'tripType' => $request->get('tripType'),
            'status' => $request->get('status'),
            'destino' => $request->get('destino'),
            'hora' => $request->get('hora'),
            'horae' => $request->get('horae'),
            'init_date' => $request->get('init_date'),
            'date_end' => $request->get('date_end')

        ];

        switch ($sort) {
            case 1:
                $sort = 'FirstName';
                break;
            case 2:
                $sort = 'Time';
                break;

            default:
                $sort = 'id';
        }

        $destinos = ges_appoinments::groupBy('AddressDestination')
        ->selectRaw('AddressDestination')
        ->where('TripType', '=', 'A')
        ->get()->pluck('AddressDestination','AddressDestination');

        $drivers = DB::table('driver_assigments')->where('Enable', 1)->pluck('Driver', 'Id');
        $centers = DB::table('medical_centers')->pluck('Name', 'AddressMedicalC');
        $cancellation = DB::table('cancellation_code')->pluck('CANCELLATION_TEXT', 'CANCELLATION_CODE');
        $date = Carbon::today()->format('Y-m-d');
        $dt = Carbon::create('2020-09-08');

        $appoinments = ges_appoinments::getTrips($params,$sort,$centers);

        $patientDummy = Patients::where('Email', '=', 'patientzero@yomail.com')->first();
        foreach ($appoinments as $key => $value) {
            if (isset($value->IdMC) == false) {
                $appoinments[$key]['IdMC'] = $patientDummy->Id;
            }
        }

        return [
            'destinationPlace' =>  $destinos,
            'driver' => $drivers,
            'centers' => $centers,
            'cancellation' => $cancellation,
            'date' => $date,
            'appoinments' => $appoinments

        ];
    }
*/

    function getSheetLog($commonData)
    {
        return [
            'controlCenter' => false,
            'log' => true,
            'destinos' =>  $commonData['destinationPlace'],
            'drivers' => $commonData['driver'],
            'centers' => $commonData['centers'],
            'cancellation' => null,
            'date' => $commonData['date'],
            'appoinments' => $commonData['appoinments'],
            'requeriments' => null,
            'totalTrips' =>  null,
            'tripsAssigned' => null,
            'tripsNotAssigned' => null,
            'tripsCanceled' => null,
            'horas' => $commonData['horas'],

        ];
    }

    function getTripsPlanner($commonData)
    {        //$commonData = $this->getCommonData($request,$appoinment);

        $special_requeriments = DB::table('special_requeriments')->pluck('requeriment', 'id')->chunk(4);
        $totalTrips = DB::table('ges_appoinments')->count();
        $tripsAssigned = DB::table('ges_appoinments')->where('Driver', '<>', null)->count();
        $tripsNotAssigned = DB::table('ges_appoinments')->where('Driver', '=', null)->count();
        $tripsCanceled = DB::table('ges_appoinments')->where([
            ['Driver', '<>', null],
            ['CD', '<>', null]
        ])->count();
        return [
            'controlCenter' => false,
            'log' => false,
            'destinos' =>  $commonData['destinationPlace'],
            'drivers' => $commonData['driver'],
            'centers' => $commonData['centers'],
            'cancellation' => $commonData['cancellation'],
            'date' => $commonData['date'],
            'appoinments' => $commonData['appoinments'],
            'requeriments' => $special_requeriments,
            'totalTrips' =>  $totalTrips,
            'tripsAssigned' => $tripsAssigned,
            'tripsNotAssigned' => $tripsNotAssigned,
            'tripsCanceled' => $tripsCanceled,
            'horas' => $commonData['horas'],
            //'totalFilter' => $totalTrips,
        ];
    }

    function getTripsPlannerTypeB($commonData)
    {        //$commonData = $this->getCommonData($request,$appoinment);

        //dd($commonData);
        $special_requeriments = DB::table('special_requeriments')->pluck('requeriment', 'id')->chunk(4);
        $totalTrips = DB::table('ges_appoinments')->where('TripType', '=', 'B')->count();
        $tripsAssigned = DB::table('ges_appoinments')->where('Driver', '<>', null)->where('TripType', '=', 'B')->count();
        $tripsNotAssigned = DB::table('ges_appoinments')->where('Driver', '=', null)->where('TripType', '=', 'B')->count();
        $tripsCanceled = DB::table('ges_appoinments')->where([
            ['Driver', '<>', null],
            ['CD', '<>', null]
        ])->where('TripType', '=', 'B')->count();

        return [
            'controlCenter' => false,
            'log' => false,
            'destinos' =>  $commonData['destinationPlace'],
            'drivers' => $commonData['driver'],
            'centers' => $commonData['centers'],
            'cancellation' => $commonData['cancellation'],
            'date' => $commonData['date'],
            'appoinments' => $commonData['appoinments'],
            'requeriments' => $special_requeriments,
            'totalTrips' =>  $totalTrips,
            'tripsAssigned' => $tripsAssigned,
            'tripsNotAssigned' => $tripsNotAssigned,
            'tripsCanceled' => $tripsCanceled,
            'horas' => $commonData['horas'],
            //'totalFilter' => $totalTrips,
        ];
    }

    function getControlCenter($commonData)
    {

        //$commonData = $this->getCommonData($request);
        $horas = ges_appoinments::groupBy('Time')
            ->selectRaw('Time')
            ->where('TripType', '=', 'A')
            ->get()->pluck('Time', 'Time');
        return [
            'controlCenter' => true,
            'log' => false,
            'destinos' =>  $commonData['destinationPlace'],
            'drivers' => $commonData['driver'],
            'centers' => $commonData['centers'],
            'cancellation' => $commonData['cancellation'],
            'date' => $commonData['date'],
            'appoinments' => $commonData['appoinments'],
            'horas' => $commonData['horas'],

        ];
    }
}
