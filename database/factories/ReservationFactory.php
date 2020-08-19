<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Movie;
use App\Reservation;
use App\User;
use Faker\Generator as Faker;

$factory->define(Reservation::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'movie_id' => factory(Movie::class),
        'status' => 'OPEN',
        'return_date' => $faker->date('Y-m-d', '2020-12-31'),
    ];
});
