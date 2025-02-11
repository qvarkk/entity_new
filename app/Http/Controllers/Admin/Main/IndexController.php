<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
//        $data['usersCount'] = User::all()->count();
//        $data['postsCount'] = Post::all()->count();
//        $data['categoriesCount'] = Category::all()->count();
//        $data['tagsCount'] = Tag::all()->count();
        $data['usersCount'] = 1;
        $data['postsCount'] = 2;
        $data['categoriesCount'] = 3;
        $data['tagsCount'] = 4;
        return view('admin.main.index', compact('data'));
    }
}
