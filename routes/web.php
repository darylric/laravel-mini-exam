<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\PostController;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [PostController::class, 'index'])->name('home.posts');

Auth::routes();

// After login
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ---------------------------------------------------------
// PUBLIC POST ROUTES
// ---------------------------------------------------------

// Lists all posts (latest first)
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');


// Lists posts for a specific user
Route::get('/users/{user}/posts', [PostController::class, 'userPosts'])->name('users.posts');

// ---------------------------------------------------------
// PROTECTED ROUTES (Require Login)
// ---------------------------------------------------------

Route::middleware('auth')->group(function () {

    // Show form to create post
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

    // Create post (POST)
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    // Optional CRUD:

    // Show edit form
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

    // Update post
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

    // Delete post
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

// Shows single post
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
