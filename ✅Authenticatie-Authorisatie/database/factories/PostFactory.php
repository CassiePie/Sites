<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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
    public function definition()
    {
        $title = $this->faker->sentence(rand(4,8));
        $slug = Str::slug($title) . '-' . $this->faker->uuid();

        return [
            'title' => $title,
            'subtitle' => $this->faker->sentence(rand(3,6)),
            'url' => $slug,
            'published' => $this->faker->boolean(),
            'status' => $this->faker->boolean() ? 'draft' : 'final',
            'content' => $this->faker->paragraph(rand(2, 8)),
            'user_id' => rand(1, 20),
        ];
    }
}
