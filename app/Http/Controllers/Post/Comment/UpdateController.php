<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\UpdateRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, Comment $comment)
    {
        if (!Gate::allows('update-comment', [$comment, auth()->user()])) {
            abort(403);
        }

        $data = $request->validated();
        $comment->update($data);

        return redirect()->route('post.show', $comment->post->id);
    }
}
