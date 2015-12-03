<?php
Route::post('/auth/login', ['uses' => 'UserController@login']);
Route::post('/auth/verify', ['uses' => 'UserController@verify']);