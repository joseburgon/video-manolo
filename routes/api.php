<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/reservations', 'ReservationController@index');
    Route::post('/reservations', 'ReservationController@store');

});

Route::get('/movies', 'MovieController@index');
