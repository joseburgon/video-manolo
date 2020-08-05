<?php

namespace Tests\Feature;

use App\Reservation;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class RetrieveReservationsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_retrieve_reservations()
    {
        $this->withoutExceptionHandling();

        Sanctum::actingAs($user = factory(User::class)->create(), ['*']);

        $reservations = factory(Reservation::class, 2)->create(['user_id' => $user->id]);

        $response = $this->get('/api/reservations');

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'data' => [
                            'type' => 'reservations',
                            'reservation_id' => $reservations->last()->id,
                            'attributes' => [
                                'movie_id' => $reservations->last()->movie_id,
                            ]
                        ]
                    ],
                    [
                        'data' => [
                            'type' => 'reservations',
                            'reservation_id' => $reservations->first()->id,
                            'attributes' => [
                                'movie_id' => $reservations->first()->movie_id,
                            ]
                        ]
                    ]
                ],
                'links' => [
                    'self' => url('/reservations'),
                ]
            ]);
    }

    /** @test */
    public function a_user_can_only_retrieve_their_reservations()
    {
        Sanctum::actingAs($user = factory(User::class)->create(), ['*']);

        $reservations = factory(Reservation::class)->create();

        $response = $this->get('/api/reservations');

        $response->assertStatus(200)
            ->assertExactJson([
                'data' => [],
                'links' => [
                    'self' => url('/reservations')
                ]
            ]);
    }
}
