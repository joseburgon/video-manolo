<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reservation as ReservationResource;
use App\Http\Resources\ReservationCollection;
use App\Movie;
use App\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        return new ReservationCollection(request()->user()->reservations);
    }

    public function store()
    {
        //dd(request()->input());

        $data = request()->validate([
            'data.attributes.movie_id' => 'required',
            'data.attributes.return_date' => 'required|date|after:today',
        ]);

        $movie = Movie::find($data['data']['attributes']['movie_id']);

        $stock = $movie->stock;

        if ($stock > 0) {

            $reservation = request()->user()->reservations()->create($data['data']['attributes']);

            $movie->update(['stock' => $stock - 1]);

            return new ReservationResource($reservation);
        } else {

            return response('the movie has no stock available', 403);
        }
    }

    public function userHasMovie(Movie $movie)
    {
        $movieReserved = false;

        $user = auth()->user();

        $reservation = Reservation::where([
            ['user_id', '=', $user->id],
            ['movie_id', '=', $movie->id],
            ['status', '<>', 'RETURNED'],
        ])->first();

        if ($reservation) {
            $movieReserved = true;
        }

        return response()->json(['result' => $movieReserved, 'reservation' => $reservation]);

    }
}
