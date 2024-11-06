<?php

namespace Tests\Feature\Categories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class CreateCategoryTest extends TestCase
{
    public function create_category_route(){
        return route('admin.categories.create');
    }

    public function store_category_route(){
        return route('admin.categories.store');
    }

    /** @test */
    public function unauthenticate_ad_can_not_view_create_form(): void
    {
        $response = $this->get($this->create_category_route());
        $response->assertStatus(Response::HTTP_FOUND);
    }

    /** @test */
    public function authenticate_ad_can_view_create_form(): void
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get($this->create_category_route());
        $response->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function authenticate_ad_can_create_category(): void
    {
        $this->actingAs(User::factory()->create());
        $category = Category::factory()->make();
        $response = $this->post($this->store_category_route(), $category->toArray());
        $response->assertRedirect(route('admin.categories'));
    }

    /** @test */
    public function unauthenticate_ad_can_not_create_category(): void
    {
        $category = Category::factory()->make();
        $response = $this->post($this->store_category_route(), $category->toArray());
        $response->assertStatus(Response::HTTP_FOUND);
    }

    /** @test */
    public function authenticate_ad_can_not_create_category_if_name_exists(): void
    {
        $this->actingAs(User::factory()->create());
        $category = Category::factory()->create();
        $category1 = Category::factory()->make(['name' => $category->name]);
        $response = $this->post($this->store_category_route(), $category1->toArray());
        $response->assertSessionHasErrors('name');
    }
}
