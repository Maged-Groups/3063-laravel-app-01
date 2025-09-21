<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return 'Welcome  Web';
});


// Define custom routes for the PostController before the resource routes
Route::prefix('posts')->controller(PostController::class)->group(function () {
    Route::get('/random', 'random');
});

Route::resources(
    [
        'posts' => PostController::class,
    ]
);


Route::get('init', function () {

    $models = [
        'User',
        'ReactionType',
        'PostStatus',
        'Post',
        'Comment',
        'Reply',
        'Reaction',
    ];

    foreach ($models as $model) {
        Artisan::call('make:resource', ['name' => $model . 'Resource']);

        // Hold the loop for 1 second
        // sleep(1);
    }
});
