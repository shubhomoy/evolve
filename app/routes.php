<?php

if(Request::instance()->server->get('HTTP_HOST') == Config::get('hosts.public') || Request::instance()->server->get('HTTP_HOST') == Config::get('hosts.dev')){
	include 'routes/public.php';
}
Route::group(['prefix' => 'api', 'before'=>'userAuth'], function () {
	include 'routes/api.php';
});

App::missing(function($exception) { 
    return Response::unauthorized();
});