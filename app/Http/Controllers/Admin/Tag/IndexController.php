<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class IndexController extends Controller
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

        $tags = Tag::paginate($per_page)->withQueryString();

        return view('admin.tag.index', compact('tags'));
    }
}
