<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsersListTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_index_shows_registered_users(): void
    {
        $user = User::factory()->create([
            'name' => 'Ana García',
            'email' => 'ana@example.com',
        ]);

        $response = $this->get('/users');

        $response->assertOk();
        $response->assertSee('Ana García');
        $response->assertSee('ana@example.com');
    }

    public function test_user_can_be_created_and_redirected_to_the_list(): void
    {
        $response = $this->post('/users', [
            'name' => 'Carlos López',
            'email' => 'carlos@example.com',
            'password' => 'secret123',
        ]);

        $response->assertRedirect('/users');
        $this->assertDatabaseHas('users', [
            'name' => 'Carlos López',
            'email' => 'carlos@example.com',
        ]);
    }
}
