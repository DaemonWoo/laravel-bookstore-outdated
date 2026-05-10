<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'slug' => fake()->company(),
            'author' => fake()->name(),
            'description' => fake()->text(),
            'rating' => fake()->numberBetween(0, 5),
            'category_id' => fake()->numberBetween(1, 5),
            'cover' => 'https://img.freepik.com/free-vector/abstract-elegant-winter-book-cover_23-2148798745.jpg?w=2000',
        ];
    }
}
