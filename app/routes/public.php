<?php
Route::get('/', function() {
	return 'Evovle';
});
Route::post('/auth/login', ['uses' => 'UserController@login']);
Route::post('/auth/verify', ['uses' => 'UserController@verify']);