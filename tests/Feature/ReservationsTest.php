<?php

namespace Tests\Feature;

use App\Movie;
use App\Reservation;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ReservationsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_reserve_a_movie()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $movie = factory(Movie::class)->create();

        Sanctum::actingAs($user, ['*']);

        $response = $this->post('/api/reservations/', [
            'data' => [
                'type' => 'reservations',
                'attributes' => [
                    'movie_id' => $movie->id,
                    'return_date' => '2020-10-15'
                ]
            ]
        ]);

        $reservation = Reservation::first();

        $this->assertCount(1, Reservation::all());
        $this->assertEquals($user->id, $reservation->user_id);
        $this->assertEquals(1, $reservation->movie_id);

        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'type' => 'reservations',
                    'reservation_id' => $reservation->id,
                    'attributes' => [
                        'reserved_by' => [
                            'data' => [
                                'attributes' => [
                                    'name' => $user->name
                                ]
                            ]
                        ],
                        'movie_id' => 1,
                        ]
                    ],
                    'links' => [
                        'self' => url('/reservations/' . $reservation->id),
                    ]
            ]);

    }

    /** @test */
    public function a_user_can_not_reserve_an_unavailable_movie()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $movie = Movie::create([
            'title' => 'Test Movie',
            'stock' => 0
        ]);

        Sanctum::actingAs($user, ['*']);

        $response = $this->post('/api/reservations/', [
            'data' => [
                'type' => 'reservations',
                'attributes' => [
                    'movie_id' => $movie->id,
                    'return_date' => '2020-10-30'
                ]
            ]
        ]);

        $response->assertStatus(403);
    }
}
