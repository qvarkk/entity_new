<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user)
    {
        $comments = $user->comments()->with(['post', 'user'])->get();
        $comments_count = $comments->count();

        return view('profile.show', compact('user', 'comments', 'comments_count'));
    }
}
