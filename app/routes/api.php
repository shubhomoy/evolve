<?php
Route::get('/doctor/{id}', 'DoctorController@show');
Route::get('/clinic/{id}', 'ClinicController@show');
Route::get('/search/doctors', 'DoctorController@search');
Route::get('/doctor/{id}', 'DoctorController@show');
Route::get('/doctor/{id}/appointments', 'DoctorController@showAppointments');
Route::get('/doctor/{doctor_id}/clinic/{clinic_id}', 'DoctorController@addRemoveClinic');
Route::get('/doctor/{doctor_id}/specialization/{spec_id}', 'DoctorController@addRemoveSpecialization');