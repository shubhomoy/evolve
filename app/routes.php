<?php

include 'routes/public.php';
Route::group(['prefix' => 'api', 'before'=>'userAuth'], function () {
	include 'routes/api.php';
});

App::missing(function($exception) { 
    return Response::unauthorized();
});

Route::get('/api/search/doctors', 'DoctorController@search');

Route::get('/api/specializations', 'DoctorController@showAllSpecializations');
Route::get('/api/doctor/{id}', 'DoctorController@show');
Route::get('/api/doctor/{id}/appointments', 'DoctorController@showAppointments');
Route::get('/api/doctor/{doctor_id}/clinic/{clinic_id}', 'DoctorController@addRemoveClinic');
Route::get('/api/doctor/{doctor_id}/specialization/{spec_id}', 'DoctorController@addRemoveSpecialization');
Route::post('/auth/doctor/signup', 'DoctorController@signup');
Route::post('/auth/doctor/login', 'DoctorController@login');

Route::get('/api/clinic/{id}', 'ClinicController@show');
Route::get('/api/clinics', 'ClinicController@index');

Route::post('/api/appointment', 'AppointmentController@makeAppointment');
Route::post('/api/appointment/verify', 'AppointmentController@verifyAppointment');

Route::get('/seealldocs', function() {
	return Response::json(['doctors' => Doctor::all()]);
});
