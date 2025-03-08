<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Comment $comment)
    {
        if (!Gate::allows('update-comment', [$comment, auth()->user()])) {
            abort(403);
        }

        return view('post.comment.edit', compact('comment'));
    }
}
