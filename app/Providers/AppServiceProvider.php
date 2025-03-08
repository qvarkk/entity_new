<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        Gate::define('update-comment', function(User $user, Comment $comment) {
            return $comment->user_id === $user->id;
        });

        Gate::define('delete-comment', function(User $user, Comment $comment) {
            return $comment->user_id === $user->id || $user->role == User::ROLE_ADMIN;
        });
    }
}
