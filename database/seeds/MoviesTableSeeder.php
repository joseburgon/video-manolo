<?php

use App\Movie;
use App\Repositories\TmdbApi;
use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topRatedMovies = [];

        $apiRepo = new TmdbApi();

        for ($page = 1; $page < 4; $page++) { 
            
            $results = $apiRepo->getTopRated($page);
            $topRatedMovies = array_merge($topRatedMovies, $results);

        }

        foreach ($topRatedMovies as $movie) {

            $newMovie = Movie::create([
                'id' => $movie['id'],
                'popularity' => $movie['popularity'],
                'vote_count' => $movie['vote_count'],
                'poster_path' => $movie['poster_path'],
                'adult' => $movie['adult'],
                'backdrop_path' => $movie['backdrop_path'],
                'original_language' => $movie['original_language'],
                'original_title' => $movie['original_title'],
                'title' => $movie['title'],
                'vote_average' => $movie['vote_average'],
                'overview' => $movie['overview'],
                'release_date' => $movie['release_date'],
                'stock' => rand(0, 5),
            ]);
            
            $newMovie->genres()->attach($movie['genre_ids']);

        }
    }
}
