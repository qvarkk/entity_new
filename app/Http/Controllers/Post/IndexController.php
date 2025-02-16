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

        $trending_posts_max = 4;
        $random_posts_max = 8;

        $trending_posts_count = min($posts_count, $trending_posts_max);
        $random_posts_count = min($posts_count, $random_posts_max);

        $trending_posts = Post::orderBy('liked_users_count', 'desc')->limit($trending_posts_count)->get();
        $random_posts = Post::get()->random($random_posts_count);


        return view('post.index', compact('recent_posts', 'random_posts', 'trending_posts'));
    }
}
