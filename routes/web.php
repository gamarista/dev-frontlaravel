<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/roles', function () {
    return view('roles');
})->name('roles');

/*Route::get('/reguser', function () {
    return view('auth.registeruser');
})->name('reguser');

Route::get('/testmap', function () {
    return view('gmaps.testmap');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/crear', 'Auth\RegisterController@crear')->name('crear');

//****import Kareo*****
Route::get('/importapi', 'tmp_appoinmentsController@indexkareo')->name('importapi');
Route::post('/importdataapi', 'tmp_appoinmentsController@importdataapi')->name('importdataapi');
//****import excel*****
Route::get('/importfile', 'tmp_appoinmentsController@index')->name('importfile');
Route::post('/import', 'tmp_appoinmentsController@import')->name('import');
Route::get('/importcancel', 'tmp_appoinmentsController@importcancel')->name('importcancel');

//****REsource Zones****
Route::get('/resource-zone', 'ZoneController@index')->name('resource.zone');
Route::get('/resource-zone-create', 'ZoneController@create')->name('resource.zone.create');
Route::post('/resource-zone-store', 'ZoneController@store')->name('resource.zone.store');
Route::get('/resource-zone-edit', 'ZoneController@edit')->name('resource.zone.edit');
Route::post('/resource-zone-update', 'ZoneController@update')->name('resource.zone.update');
Route::get('/resource-zone-route', 'ZoneController@zoneRoute')->name('resource.zone.route');

//****REsource users****
Route::get('/resource-users', 'UserController@index')->name('resource.users');
Route::get('/resource-users-create', 'UserController@create')->name('resource.users.create');
Route::get('/resource-users-edit', 'UserController@edit')->name('resource.users.edit');
Route::post('/resource-users-store', 'UserController@store')->name('resource.users.store');
Route::post('/resource-users-status', 'UserController@status')->name('resource.users.status');
Route::put('/resource-users-update', 'UserController@update')->name('resource.users.update');
Route::get('/resource-users-reset-password', 'UserController@resetPassword')->name('resource.users.resetpassword');
Route::put('/resource-users-save-password', 'UserController@savePassword')->name('resource.users.savePassword');


//**** REsource MedicalCenters****
Route::get('/resource-centers', 'MedicalCenterController@index')->name('resource.centers');
Route::get('/resource-centers-create', 'MedicalCenterController@create')->name('resource.centers.create');
Route::post('/resource-centers-store', 'MedicalCenterController@store')->name('resource.centers.store');
Route::get('/resource-centers-edit', 'MedicalCenterController@edit')->name('resource.centers.edit');
Route::put('/resource-centers-update', 'MedicalCenterController@update')->name('resource.centers.update');
Route::get('/get-info-center', 'MedicalCenterController@getInfoCenter')->name('getinfocenter');

// REsource drivers
Route::get('/resource-drivers', 'DriverController@index')->name('resource.drivers');
Route::get('/resource-drivers-create', 'DriverController@create')->name('resource.drivers.create');
Route::post('/resource-drivers-store', 'DriverController@store')->name('resource.drivers.store');
Route::post('/resource-drivers-status', 'DriverController@status')->name('resource.drivers.status');
Route::get('/resource-drivers-edit', 'DriverController@edit')->name('resource.drivers.edit');
Route::put('/resource-drivers-update', 'DriverController@update')->name('resource.drivers.update');

// route status
Route::get('/route-status', 'DriverController@routeStatus')->name('routeStatus');
Route::post('/send-trips', 'DriverController@sentTrips')->name('senttrips');

// REsource patintes
Route::get('/resource-patients', 'PatientController@index')->name('resource.patients');
Route::get('/resource-patients-create', 'PatientController@create')->name('resource.patients.create');
Route::post('/resource-patients-store', 'PatientController@store')->name('resource.patients.store');
Route::get('/resource-patients-edit', 'PatientController@edit')->name('resource.patients.edit');
Route::put('/resource-patients-update', 'PatientController@update')->name('resource.patients.update');

// resource vehicles
Route::get('/resource-vehicles', 'VehiclesController@index')->name('resource.vehicles');
Route::get('/resource-vehicles-create', 'VehiclesController@create')->name('resource.vehicles.create');
Route::get('/resource-vehicles-edit', 'VehiclesController@edit')->name('resource.vehicles.edit');
Route::post('/resource-vehicles-store', 'VehiclesController@store')->name('resource.vehicles.store');
Route::put('/resource-vehicles-update', 'VehiclesController@update')->name('resource.vehicles.update');
Route::post('/resource-vehicles-status', 'VehiclesController@status')->name('resource.vehicles.status');

//****trips****
Route::get('/trips', 'TripsController@index')->name('trips');
Route::post('/tripsok', 'TripsController@tripsok')->name('tripsok');
Route::get('/trips-planner', 'TripsController@tripsPlanner')->name('tripsplanner');
Route::get('/front-desk', 'TripsController@frontdeskPlanner')->name('frontdeskplanner');
Route::get('/front-desk/confirmed', 'TripsController@frontdeskPlannerConfirmed')->name('frontdeskplannerconfirmed');
Route::post('/assign-driver-appoinment', 'TripsController@assignDriverAppoinment')->name('assigndriver');
Route::post('/change-driver', 'TripsController@changeDriverAppoinment')->name('changedriver');
Route::post('/assign-code-cancellation', 'TripsController@assingCancellationCode')->name('assigncodecancellation');
Route::post('/assing-uncancel', 'TripsController@assingUncancel')->name('assinguncancel');
Route::post('/edit-ges-appoinment', 'TripsController@editGesAppoinment')->name('editgestappoinment');
Route::post('/store', 'TripsController@store')->name('trips.store');
Route::get('/create', 'TripsController@create')->name('trips.create');

// Appoinmentes
Route::get('/trips-log', 'AppoinmentsController@tripsLog')->name('tripsLog');

//Trips control center
Route::get('/control-center', 'TripsController@controlCenter')->name('controlcenter');

//logs
Route::get('/activity-log', 'DriverAppoinmentStatsController@index')->name('activitylog');

Route::resource('message', 'NotificationTripController');

//****Patients****
Route::get('/get-patients', 'PatientController@getPatient')->name('getpatients');

Route::get('/test/{origen}/{destino}', 'HomeController@test')->name('test');
//****MAPS*******
Route::get('genroutes', 'MapsController@genroutes')->name('genroutes');
Route::get('mapsgenroutes', 'MapsController@mapsgenroutes')->name('mapsgenroutes');
Route::get('mapsarea', 'MapsController@mapsarea')->name('mapsarea');
Route::get('mapsaread', 'MapsController@mapsaread')->name('mapsaread');
Route::get('showroutes/{wDate}/{wTime}/{wOrig}/{wDest}/{idDriver}', 'MapsController@showroutes')->name('showroutes');
Route::get('showroutesd/{wDate}/{wTimeB}/{wTimeE}/{wDest}/{idDriver}/{wAssignDriver}', 'MapsController@showroutesd')->name('showroutesd');
Route::get('genroutesd/{wDate}/{wTimeB}/{wTimeE}/{wDest}/{idDriver}', 'MapsController@genroutesd')->name('genroutesd');
Route::post('/getarea', 'MapsController@getarea')->name('getarea');
Route::post('/getaread', 'MapsController@getaread')->name('getaread');
Route::post('/setarea', 'MapsController@setarea')->name('setarea');
Route::get('/comparearea/{d1}/{d2}/{d3}', 'MapsController@comparearea')->name('comparearea');
//*****RIDE*****
Route::post('mapsarearides', 'MapsController@mapsarearide')->name('mapsarearides');
Route::post('mapsrouteoneride', 'MapsController@mapsrouteoneride')->name('mapsrouteoneride');
Route::get('genrides', 'MapsController@genrides')->name('genrides');


//***********Scheduler***********
Route::get('/schedule', 'ScheduleController@schedule')->name('schedule');
Route::get('/wschedule', 'ScheduleController@wschedule')->name('wschedule');
Route::get('/wkschedule', 'ScheduleController@wkschedule')->name('wkschedule');
//Route::post('/webregcalendar', 'FrontController@regcalendars')->name('webregcalendar');
Route::post('sregcalendars', 'Controller@sregcalendars');
Route::get('getpatient', 'Controller@getpatient')->name('sgetpatient');




//****************reports********
// reports
Route::get('/report-inside', 'TripsController@reportInside')->name('reportinside');
Route::get('/report-outside', 'TripsController@reportOutside')->name('reportoutside');
Route::get('/report-trip-list', 'TripsController@reportTripList')->name('reporttriplist');
Route::get('/report-drivers', 'TripsController@reportDrivers')->name('reportdrivers');
Route::get('/report-pickup-status', 'TripsController@reportPickstatus')->name('reportpickstatus');
Route::get('/report-trips-info', 'TripsController@allTripsInfo')->name('reporttripsinfo');
Route::get('/report-trips-radius', 'TripsController@tripsDistance')->name('reportradius');
Route::get('/report-scheduled-trips', 'TripsController@scheduledTrips')->name('reportscheduledtrips');
Route::get('/report-performance-trips', 'TripsController@perfomanceTrips')->name('reportsperfomancetrips');
Route::get('/reports-filter', 'TripsController@reportsFilter')->name('reports.filters');


Route::get('test1', function () {
    return view('gmaps.index');
});

Route::get('test2', function () {
    return view('gmaps.index2');
});
