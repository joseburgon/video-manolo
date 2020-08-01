<?php

namespace Tests\Feature;

use App\Reservation;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReservationsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_reserve_a_movie()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($user = factory(User::class)->create(), 'api');

        $response = $this->post('/api/reservations/', [
            'data' => [
                'type' => 'reservations',
                'attributes' => [
                    'movie_id' => 1,
                    'return_date' => '2020-08-15'
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
}
