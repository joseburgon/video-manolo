<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Movie;
use Faker\Generator as Faker;

$factory->define(Movie::class, function (Faker $faker) {
    
    return [
        'title' => $faker->word,
        'overview' => $faker->sentence(5),
        'stock' => rand(0, 5),
    ];

});
