<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $recent_posts = Post::orderBy('created_at', 'desc')->paginate(6);
        $posts_count = $recent_posts->total();

        if ($posts_count >= 4) {
            $random_posts = Post::get()->random(4);
            $trending_posts = Post::get()->random(4);
        }
        else {
            $random_posts = Post::get()->random($posts_count);
            $trending_posts = Post::get()->random($posts_count);
        }

         // $randomPosts = Post::get()->random(4);
         // $mostLikedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'desc')->take(4)->get();
        return view('post.index', compact('recent_posts', 'random_posts', 'trending_posts'));
    }
}
