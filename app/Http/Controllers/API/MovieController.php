<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Movie as MovieResource;
use App\Http\Resources\MovieCollection;
use App\Movie;

class MovieController extends Controller
{
    public function index()
    {
        return new MovieCollection(Movie::all());
    }

    public function show(Movie $movie)
    {
        return new MovieResource($movie);
    }
}
