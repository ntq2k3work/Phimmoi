<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class DeleteUserTest extends TestCase
{
    /** @test */
    public function authenticate_admin_can_delete_user_by_id(): void
    {
        $this->actingAs(User::factory()->create());
        $user = User::factory()->create();
        $response = $this->post(route('admin.users.destroy',$user->id));
        $this->assertDatabaseMissing('users',$user->toArray());
    }

    /** @test */
    public function unauthenticate_admin_can_not_delete_user_by_id(): void
    {
        $user = User::factory()->create();
        $response = $this->post(route('admin.users.destroy',$user->id));
        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function authenticate_admin_can_not_delete_user_when_id_invalid(): void
    {
        $this->actingAs(User::factory()->create());
        $userId = -1;
        $response = $this->post(route('admin.users.destroy',$userId));
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
