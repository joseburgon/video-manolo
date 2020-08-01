<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Movie extends JsonResource
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
                'type' => 'movies',
                'movie_id' => $this->id,
                'attributes' => [
                    'popularity' => $this->popularity,
                    'vote_count' => $this->vote_count,
                    'poster_path' => $this->poster_path,
                    'adult' => $this->adult,
                    'backdrop_path' => $this->backdrop_path,
                    'original_language' => $this->original_language,
                    'original_title' => $this->original_title,
                    'title' => $this->title,
                    'vote_average' => $this->vote_average,
                    'overview' => $this->overview,
                    'release_date' => $this->release_date,
                ]
            ],
            'links' => [
                'self' => url('/movies/' . $this->id),
            ]
        ];
    }
}
