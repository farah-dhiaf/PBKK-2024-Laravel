<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Category;

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
    // protected $model = Post::class;
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(6),
            'author_id' => User::factory(),
            'category_id' => Category::factory(),
            'slug' => Str::slug(fake()->sentence()),
            'body' => fake()->text(),
            //
        ];
    }
}
