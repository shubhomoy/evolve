<?php

include 'routes/public.php';
Route::group(['prefix' => 'api'], function () {
	include 'routes/api.php';
});

App::missing(function($exception) { 
    return Response::unauthorized();
});

Route::get('/api/search/doctors', 'DoctorController@search');

Route::get('/api/specializations', 'DoctorController@showAllSpecializations');
Route::post('/auth/doctor/signup', 'DoctorController@signup');
Route::post('/auth/doctor/login', 'DoctorController@login');

Route::get('/api/clinic/{id}', 'ClinicController@show');
Route::get('/api/clinics', 'ClinicController@index');

Route::post('/api/appointment', 'AppointmentController@makeAppointment');
Route::post('/api/appointment/verify', 'AppointmentController@verifyAppointment');

Route::get('/seealldocs', function() {
	$doctors = Doctor::all();
	echo dump($doctors);
});
