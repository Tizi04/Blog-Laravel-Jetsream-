<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Livewire\PostUpdate;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('posts/{postId}/edit', PostUpdate::class)->name('posts.edit');

    Route::resource('posts', PostController::class)->except(['index']);

    Route::get('my-posts', [PostController::class, 'myPosts'])->name('myPosts');
});
