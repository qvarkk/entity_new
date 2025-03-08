<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $per_page = $request->input('perpage');

        if (is_null($per_page)) {
            $per_page = 10;
        }

        $posts = Post::paginate($per_page)->withQueryString();

        return view('admin.post.index', compact('posts'));
    }
}
