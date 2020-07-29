<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;

class Reservation extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'reservations',
                'reservation_id' => $this->id,
                'attributes' => [
                    'reserved_by' => new UserResource($this->user),
                    'movie_id' => $this->movie_id,
                    ]
                ],
                'links' => [
                    'self' => url('/reservations/' . $this->id),
                ]
        ];
    }
}
