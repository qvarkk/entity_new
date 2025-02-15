<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'a@a',
            'password' => Hash::make('a'),
            'role' => User::ROLE_ADMIN,
        ]);

        User::factory(10)->create();

        Category::factory(10)->create();
        $tags = Tag::factory(25)->create();
        $posts = Post::factory(100)->create();

        foreach ($posts as $post) {
            $random_tags = $tags->random(rand(1, 5));
            $post->tags()->sync($random_tags);
        }
    }
}
