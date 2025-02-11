<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Main')->group(function () {
    Route::get('/', IndexController::class)->name('main.index');
});

Route::namespace('App\Http\Controllers\Post')->prefix('posts')->group(function () {
    Route::get('/', IndexController::class)->name('post.index');
});

Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->group(function () {
    Route::namespace('Main')->group(function () {
       Route::get('/', IndexController::class)->name('admin.main.index');
    });

    Route::namespace('Post')->prefix('posts')->group(function () {
        Route::get('/', IndexController::class)->name('admin.post.index');
        Route::post('/', StoreController::class)->name('admin.post.store');
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
});
