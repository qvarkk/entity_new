<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\GuestMiddleware;
use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Main')->group(function () {
    Route::get('/', IndexController::class)->name('main.index');
});

Route::namespace('App\Http\Controllers\Post')->prefix('posts')->group(function () {
    Route::get('/', IndexController::class)->name('post.index');
    Route::get('/{post}', ShowController::class)->name('post.show');

    Route::post('/{post}', Like\ToggleController::class)->name('post.like.toggle');
    Route::post('/{post}/comment', Comment\StoreController::class)->name('post.comment.store');
});

Route::namespace('App\Http\Controllers\Profile')->prefix('profile')->group(function () {
    Route::get('/{user}', ShowController::class)->name('profile.show');
});

Route::namespace('App\Http\Controllers\Auth')->group(function () {
    Route::middleware([GuestMiddleware::class])->group(function () {
        Route::get('/login', LoginController::class)->name('auth.login');
        Route::get('/register', RegisterController::class)->name('auth.register');
    });
});

// TODO: ???
Route::post('/auth/login', [\App\Http\Controllers\Auth\AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::post('/auth/register', [\App\Http\Controllers\Auth\AuthController::class, 'register'])->name('auth.create');
Route::get('/auth/logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('auth.logout');


Route::namespace('App\Http\Controllers\Admin')
    ->middleware([AuthMiddleware::class, AdminMiddleware::class])
    ->prefix('admin')
    ->group(function () {
        Route::namespace('Main')->group(function () {
           Route::get('/', IndexController::class)->name('admin.main.index');
        });

        Route::namespace('Post')->prefix('posts')->group(function () {
            Route::get('/', IndexController::class)->name('admin.post.index');
            Route::get('/create', CreateController::class)->name('admin.post.create');
            Route::post('/', StoreController::class)->name('admin.post.store');
            Route::get('/{post}', ShowController::class)->name('admin.post.show');
            Route::get('/{post}/edit', EditController::class)->name('admin.post.edit');
            Route::patch('/{post}', UpdateController::class)->name('admin.post.update');
            Route::delete('/{post}', DestroyController::class)->name('admin.post.destroy');
        });

        Route::namespace('Category')->prefix('categories')->group(function () {
            Route::get('/', IndexController::class)->name('admin.category.index');
            Route::get('/create', CreateController::class)->name('admin.category.create');
            Route::post('/', StoreController::class)->name('admin.category.store');
            Route::get('/{category}', ShowController::class)->name('admin.category.show');
            Route::get('/{category}/edit', EditController::class)->name('admin.category.edit');
            Route::patch('/{category}', UpdateController::class)->name('admin.category.update');
            Route::delete('/{category}', DestroyController::class)->name('admin.category.destroy');
        });

        Route::namespace('Tag')->prefix('tags')->group(function () {
            Route::get('/', IndexController::class)->name('admin.tag.index');
            Route::get('/create', CreateController::class)->name('admin.tag.create');
            Route::post('/', StoreController::class)->name('admin.tag.store');
            Route::get('/{tag}', ShowController::class)->name('admin.tag.show');
            Route::get('/{tag}/edit', EditController::class)->name('admin.tag.edit');
            Route::patch('/{tag}', UpdateController::class)->name('admin.tag.update');
            Route::delete('/{tag}', DestroyController::class)->name('admin.tag.destroy');
        });

        Route::namespace('User')->prefix('users')->group(function () {
            Route::get('/', IndexController::class)->name('admin.user.index');
            Route::get('/create', CreateController::class)->name('admin.user.create');
            Route::post('/', StoreController::class)->name('admin.user.store');
            Route::get('/{user}', ShowController::class)->name('admin.user.show');
            Route::get('/{user}/edit', EditController::class)->name('admin.user.edit');
            Route::patch('/{user}', UpdateController::class)->name('admin.user.update');
            Route::delete('/{user}', DestroyController::class)->name('admin.user.destroy');
        });
    }
);
