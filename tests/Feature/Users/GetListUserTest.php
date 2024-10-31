<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class GetListUserTest extends TestCase
{
    /** @test */
    public function authenticate_user_can_get_list_user(): void
    {
        $response = $this-> get(route('admin.users'));
        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function unauthenticate_user_can_not_get_list_user(): void
    {
        $this->actingAs(User::factory()->create());
        $response = $this-> get(route('admin.users'));
        $response->assertStatus(Response::HTTP_OK);
    }
}
