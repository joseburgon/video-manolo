<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieCollection;
use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return new MovieCollection(Movie::all());
    }
}
