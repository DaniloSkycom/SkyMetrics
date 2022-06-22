<?php

use Illuminate\Support\Facades\Route;

Route::get("ScriptHoras", "AutomateHourController@index");
Route::get("ScriptHorasLocal", "AutomateHourController@ViciLocal");

Auth::routes();
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

/* Rutas Protegidas */
Route::group(['middleware' => ['auth']  ], function () {

    Route::get('/home', 'HomeController@index');

});

URL::forceScheme('https');