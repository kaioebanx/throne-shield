<?php

namespace Tests\Feature\ChallengeGroup;

use App\Auth\Persistence\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChallengeGroupTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_create_challenge_group(): void
    {
        $user = User::factory()->create();
        auth()->setUser($user);

        $response = $this->post('/api/challenge-groups', [
            'name' => 'Kaio Challenge',
            'end_date' => now()->addDays(7)->toDateString(),
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'name' => 'Kaio Challenge',
            'end_date' => now()->addDays(7)->toDateString(),
        ]);
    }

    public function test_authenticated_user_can_update_challenge_group(): void
    {
        $user = User::factory()->create();
        auth()->setUser($user);

        $response = $this->post('/api/challenge-groups', [
            'name' => 'Kaio Challenge',
            'end_date' => now()->addDays(7)->toDateString(),
        ]);

        $id = $response->json('id');

        $response = $this->put('/api/challenge-groups/' . $id, [
            'name' => 'Updated Challenge',
            'end_date' => now()->addDays(10)->toDateString(),
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'id' => $id,
            'name' => 'Updated Challenge',
            'end_date' => now()->addDays(10)->toDateString(),
        ]);
        $this->assertDatabaseHas('challenge_groups', [
            'id' => $id,
            'name' => 'Updated Challenge',
            'end_date' => now()->addDays(10)->toDateString(),
        ]);
    }

    public function test_get_challenge_group_throw_exception(): void
    {
        $user = User::factory()->create();
        auth()->setUser($user);

        $response = $this->get('/api/challenge-groups/4');

        $response->assertNotFound();
        $response->assertJson([
            "message"=> "Challenge group not found."
        ]);
    }
}
