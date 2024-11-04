<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class UpdateUserTest extends TestCase
{

    // public function get_edit_user_route($id){
    //     route('admin.users.edit',$id);
    // }

    public function update_user_route($id)
    {
        return route('admin.users.update', ['id' => $id]);
    }
    // /** @test */
    // public function authenticate_user_can_view_update_form(): void
    // {
    //     $this->actingAs(User::factory()->create());
    //     $user = User::factory()->create();
    //     $response = $this->get($this->get_edit_user_route($user->id));
    //     $response->assertViewHas($user->name);
    // }

    /** @test */
    public function authenticate_user_update_user_by_id()
    {
        $this->actingAs(User::factory()->create());
        $user = User::factory()->create();
        $newName = fake()->name();

        $response = $this->post($this->update_user_route($user->id), ['name' => $newName]);

        $response->assertRedirect(route('admin.users'));
        $this->assertDatabaseHas('users', ['id' => $user->id, 'name' => $newName]);
    }

    /** @test */
    public function unauthenticate_user_can_not_update_user_by_id()
    {
        $user = User::factory()->create();
        $newName = fake()->name();
        $response = $this->post($this->update_user_route($user->id), ['name' => $newName]);
        $response->assertRedirect(route('login'));
        $response->assertStatus(Response::HTTP_FOUND);
    }

    /** @test */
    public function authenticate_user_can_not_update_user_when_id_dont_exists()
    {
        $this->actingAs(User::factory()->create());
        $userId = -1;
        $newName = fake()->name();
        $response = $this->post($this->update_user_route($userId), ['name' => $newName]);
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    /** @test */
    public function authenticate_user_can_not_update_user_when_email_exists()
    {
        $this->actingAs(User::factory()->create());
        $user1 = User::factory()->create();
        $user = User::factory()->create();
        $response = $this->post($this->update_user_route($user->id), ['email' => $user1->email]);
        $response->assertSessionHasErrors(['email']);
    }

    /** @test */
    public function authenticate_user_can_not_update_user_when_phone_number_exists()
    {
        $this->actingAs(User::factory()->create());
        $user1 = User::factory()->create();
        $user = User::factory()->create();
        $response = $this->post($this->update_user_route($user->id), ['phone_number' => $user1->phone_number]);
        $response->assertSessionHasErrors(['phone_number']);
    }
    /** @test */
    public function authenticate_user_can_not_update_user_when_email_dont_valid()
    {
        $this->actingAs(User::factory()->create());
        $user = User::factory()->create();
        $response = $this->post($this->update_user_route($user->id), ['email' => 'hrwekrew31321']);
        $response->assertSessionHasErrors(['email']);
    }
}
