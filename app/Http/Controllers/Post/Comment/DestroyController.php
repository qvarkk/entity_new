<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DestroyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Comment $comment)
    {
        if (!Gate::allows('delete-comment', [$comment, auth()->user()])) {
            abort(403);
        }

        $comment->delete();

        return redirect()->back();
    }
}
