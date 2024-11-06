<?php

namespace Tests\Feature\Categories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class GetListCategoriesTest extends TestCase
{
    /** @test */
    public function authenticate_admin_can_get_list_categories(): void
    {
        $this->actingAs(User::factory()->create());
        $category = Category::factory()->create();
        $response = $this->get(route('admin.categories'));
        $response->assertSee($category->name);
        $response->assertStatus(200);
    }

    /** @test */
    public function unauthenticate_admin_can_not_get_list_categories(): void
    {
        $category = Category::factory()->create();
        $response = $this->get(route('admin.categories'));
        $response->assertRedirect(route('login'));
        $response->assertStatus(Response::HTTP_FOUND);
    }
}
