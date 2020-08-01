<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TmdbApi
{
    private $baseUrl = 'https://api.themoviedb.org/3/';

    private $params = [
        'api_key' => '2d42e69235a69efaa787770f43e31ddd',
        'language' => 'es-MX',
        'region' => 'US'
    ];

    public function __construct()
    {
        //
    }

    public function getTopRated($page)
    {
        if (isset($page)) {
            $this->params['page'] = $page;
        }

        $response = Http::get($this->baseUrl . 'movie/top_rated', $this->params)
            ->throw();

        if ($response->successful()) {

            return $response->json()['results'];
        }
    }
}
