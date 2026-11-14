<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),
            'title' => fake()->sentence(),
            'summary' => fake()->sentence(),
            'body' => fake()->paragraphs(3, true),
            'permalink' => fake()->unique()->slug(),
            'published_at' => null,
            'thumbnail' => null,
        ];
    }
}
