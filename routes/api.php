<?php

use Illuminate\Support\Facades\Route;

Route::post('register', 'API\RegisterController@register');
Route::post('login', 'API\LoginController@login');
Route::post('logout', 'API\LoginController@logout')->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {

    Route::get('user', 'API\AuthUserController@show');

    Route::apiResources([
        'movies' => 'API\MovieController',
        'reservations' => 'API\ReservationController',
    ]);

});
