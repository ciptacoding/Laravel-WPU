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
    public function definition()
    {
        return [
            'title' => fake()->sentence(6),
            'slug' => fake()->slug(),
            'excerpt' => fake()->sentence(8),
            'body' => collect(fake()->paragraphs(mt_rand(10,12)))
                      ->map(function($p){
                        return "<p>$p</p>";
                      })
                      ->implode(''),
            'category_id' => mt_rand(1,4),
            'user_id' => mt_rand(1,2),
        ];
    }
}
