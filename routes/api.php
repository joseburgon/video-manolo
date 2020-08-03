<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', 'RegisterController@register');
Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout')->middleware('auth:api');

Route::middleware('auth:api')->group(function () {

    Route::get('user', 'AuthUserController@show');

    Route::apiResources([
        'movies' => 'MovieController',
        'reservations' => 'ReservationController',
    ]);

});
