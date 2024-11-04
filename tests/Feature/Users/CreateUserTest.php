<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class CreateUserTest extends TestCase
{

    public function get_create_user_route(){
        return route('admin.users.create');
    }

    public function get_store_user_route(){
        return route('admin.users.store');
    }

    /** @test */
    public function authenticate_user_can_view_create_form(): void
    {
        $response = $this->get(route('admin.users.create'));
        $response->assertStatus(Response::HTTP_FOUND);
    }

    /** @test */
    public function unauthenticate_user_can_view_create_form(): void
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get($this->get_create_user_route());
        $response->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function authenticate_user_can_create_user(): void
    {
        $this->actingAs(User::factory()->create());
        $userData = [
            'name' => fake()->name(),
            'email' => fake()->unique()->email(),
            'password' => 'password',
            'password_confirmation' => 'password',
            'phone_number' => rand(100000000, 999999999) . '9',
            'birthday' => fake()->date(),
            'gender' => rand(-1,1),
            'address' => fake()->address(),
        ];
        $response = $this->post($this->get_store_user_route(), $userData);
        $response->assertRedirect(route('admin.users'));
    }

    /** @test */
    public function unauthenticate_user_can_not_create_user(): void
    {
        $user = User::factory()->make();
        $response = $this->post($this->get_store_user_route(), $user->toArray());
        $response->assertStatus(Response::HTTP_FOUND);
    }

    /** @test */
    public function authenticate_user_can_not_create_user_if_email_exists(): void
    {
        $this->actingAs(User::factory()->create());
        $userFaked = User::factory()->create();
        $user = User::factory()->make([
                'name' => fake()->name(),
                'email' => $userFaked->email,
                'password' => 'password',
                'password_confirmation' => 'password',
                'phone_number' => rand(100000000, 999999999) . '9',
                'birthday' => fake()->date(),
                'gender' => rand(-1,1),
                'address' => fake()->address(),
            ]);
        $response = $this->post($this->get_store_user_route(), $user->toArray());
        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function authenticated_user_cannot_create_user_with_name_null()
    {
        $this->actingAs(User::factory()->create());

        $user = User::factory()->make([
            'name' => null,
            'email' => fake()->unique()->email(),
            'password' => 'password',
            'password_confirmation' => 'password',
            'phone_number' => rand(100000000, 999999999) . '9',
            'birthday' => fake()->date(),
            'gender' => rand(-1,1),
            'address' => fake()->address(),
        ]);

        $response = $this->post($this->get_store_user_route(), $user->toArray());
        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function authenticate_user_can_not_create_user_if_phone_exists(): void
    {
        $this->actingAs(User::factory()->create());
        $userFaked = User::factory()->create();
        $user = User::factory()->make([
                'name' => fake()->name(),
                'email' => fake()->unique()->email(),
                'password' => 'password',
                'password_confirmation' => 'password',
                'phone_number' => $userFaked->phone_number,
                'birthday' => fake()->date(),
                'gender' => rand(-1,1),
                'address' => fake()->address(),
            ]);
        $response = $this->post($this->get_store_user_route(), $user->toArray());
        $response->assertSessionHasErrors('phone_number');
    }
}
