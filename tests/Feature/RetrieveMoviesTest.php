<?php

namespace Tests\Feature;

use App\Movie;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RetrieveMoviesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function app_retrieve_movies_list()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($user = factory(User::class)->create(), 'api');

        $movies = factory(Movie::class, 2)->create()->each(function (Movie $movie) {
            $movie->genres()->attach([12, 14]);
        });

        $response = $this->get('/api/movies');

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'data' => [
                            'type' => 'movies',
                            'movie_id' => $movies->first()->id,
                            'attributes' => [
                                'popularity' => $movies->first()->popularity,
                                'vote_count' => $movies->first()->vote_count,
                                'poster_path' => $movies->first()->poster_path,
                                'adult' => $movies->first()->adult,
                                'backdrop_path' => $movies->first()->backdrop_path,
                                'original_language' => $movies->first()->original_language,
                                'original_title' => $movies->first()->original_title,
                                'title' => $movies->first()->title,
                                'vote_average' => $movies->first()->vote_average,
                                'overview' => $movies->first()->overview,
                                'release_date' => $movies->first()->release_date,
                                'stock' => $movies->first()->stock,
                                'genres' => $movies->first()->genres->first(),
                            ]
                        ]
                    ],
                    [
                        'data' => [
                            'type' => 'movies',
                            'movie_id' => $movies->last()->id,
                            'attributes' => [
                                'popularity' => $movies->last()->popularity,
                                'vote_count' => $movies->last()->vote_count,
                                'poster_path' => $movies->last()->poster_path,
                                'adult' => $movies->last()->adult,
                                'backdrop_path' => $movies->last()->backdrop_path,
                                'original_language' => $movies->last()->original_language,
                                'original_title' => $movies->last()->original_title,
                                'title' => $movies->last()->title,
                                'vote_average' => $movies->last()->vote_average,
                                'overview' => $movies->last()->overview,
                                'release_date' => $movies->last()->release_date,
                                'stock' => $movies->last()->stock,
                                'genres' => $movies->first()->genres->first(),
                            ]
                        ]
                    ]
                ],
                'links' => [
                    'self' => url('/movies'),
                ]
            ]);
    }

    /** @test */
    public function app_retrieve_a_single_movie()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($user = factory(User::class)->create(), 'api');

        $movie = factory(Movie::class)->create();
        $movie->genres()->attach([12, 14]);

        $response = $this->get(route('movies.show', $movie->id));

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'type' => 'movies',
                    'movie_id' => $movie->id,
                    'attributes' => [
                        'popularity' => $movie->popularity,
                        'vote_count' => $movie->vote_count,
                        'poster_path' => $movie->poster_path,
                        'adult' => $movie->adult,
                        'backdrop_path' => $movie->backdrop_path,
                        'original_language' => $movie->original_language,
                        'original_title' => $movie->original_title,
                        'title' => $movie->title,
                        'vote_average' => $movie->vote_average,
                        'overview' => $movie->overview,
                        'release_date' => $movie->release_date,
                        'stock' => $movie->stock,
                        'genres' => $movie->genres->first(),
                    ]
                ]
            ]);
    }
}
