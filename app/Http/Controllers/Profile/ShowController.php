<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
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
        $joined_year = $user->created_at->format('F, Y');

        return view('profile.show', compact('user', 'comments', 'comments_count', 'joined_year'));
    }
}
