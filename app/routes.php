<?php

// if(Request::instance()->server->get('HTTP_HOST') == Config::get('hosts.public') || Request::instance()->server->get('HTTP_HOST') == Config::get('hosts.dev')){
// 	include 'routes/public.php';
// }
// Route::group(['prefix' => 'api', 'before'=>'userAuth'], function () {
// 	include 'routes/api.php';
// });

// App::missing(function($exception) { 
//     return Response::unauthorized();
// });


Route::get('/api/doctor/{id}', 'DoctorController@show');
Route::get('/api/clinic/{id}', 'ClinicController@show');
Route::get('/api/search/doctors', 'DoctorController@search');
Route::post('/api/appointment', 'AppointmentController@makeAppointment');
Route::post('/api/appointment/verify', 'AppointmentController@verifyAppointment');