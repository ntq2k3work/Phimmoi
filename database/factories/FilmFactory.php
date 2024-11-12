<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'national' => $this->faker->country(),
            'performer' => $this->faker->name(),
            'director' => $this->faker->name(),
            'trailer' => $this->faker-> name(),
            'avatar_img' => $this->faker-> name(),
            'poster_img' => $this->faker-> name(),
            'description' => $this->faker-> name(),
            'number_episodes' => $this->faker-> numberBetween(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
