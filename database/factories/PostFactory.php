<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // user this factory to seed the database - title and body are fake()
        return [
            //
            'user_id' => 1,
            'title' => fake()->sentence(),
            'body' => fake()->paragraph(20),
        ];
    }
}
