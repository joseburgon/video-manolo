<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reservation as ReservationResource;
use App\Http\Resources\ReservationCollection;

class ReservationController extends Controller
{
    public function index()
    {
        return new ReservationCollection(request()->user()->reservations);
    }

    public function store()
    {
        $data = request()->validate([
            'data.attributes.movie_id' => '',
            'data.attributes.return_date' => 'required|date',
        ]);

        $reservation = request()->user()->reservations()->create($data['data']['attributes']);

        return new ReservationResource($reservation);
    }
}
