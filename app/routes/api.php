<?php
Route::get('/doctor/{id}', 'DoctorController@show');
Route::get('/clinic/{id}', 'ClinicController@show');
Route::get('/search/doctors', 'DoctorController@search');