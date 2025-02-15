<?php

namespace Database\Factories;

use App\Models\Category;
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
        $images = [];

        for ($i = 0; $i < 10; $i++) {
            $images[$i] = 'post_' . $i . '.png';
        }

        return [
            'title' => $this->faker->realText(rand(10, 35)),
            'content' => $this->faker->paragraph(10),
            'category_id' => Category::all()->random()->id,
            'preview_image' => $images[array_rand($images)],
        ];
    }
}
