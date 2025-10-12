<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostStatusController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\ReactionTypeController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Welcome  API';
});

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::post('web-login', 'web_login');
    Route::post('mobile-login', 'mobile_login');
    Route::post('register', 'register');
});


Route::middleware(['auth:sanctum'])->group(function () {

    // posts
    Route::prefix('posts')->controller(PostController::class)->group(function () {
        Route::get('my-posts', 'my_posts');
    });

    // Comments
    Route::prefix('comments')->controller(CommentController::class)->group(function () {
        Route::get('deleted', 'deleted')->middleware(['hasRoles:admin|show_deleted_comments', 'isActive']);
        Route::get('restore/{id}', 'restore');
        Route::delete('permanent-delete/{comment}', 'permanent_delete');
        Route::delete('hard-delete/{id}', 'hard_delete');
        Route::get('my-comments', 'my_comments');
    });

    // Posts, comments, reactions, users, replies
    Route::apiResources(
        [
            'posts' => PostController::class,
            'comments' => CommentController::class,
            'replies' => ReplyController::class,
            'users' => UserController::class,
            'reactions' => ReactionController::class,
            'post-statuses' => PostStatusController::class,
            'reaction-types' => ReactionTypeController::class,
        ]
    );

    // Auth
    Route::prefix('auth')->controller(AuthController::class)->group(function () {
        // All Sessions
        Route::get('active-sessions', 'active_sessions');

        // logout
        Route::prefix('logout')->group(function () {
            Route::post('all', 'logout_all');
            Route::post('current', 'logout_current');
            Route::post('others', 'logout_others');
            Route::post('session/{id}', 'logout_session');
        });
        // Profile

        Route::prefix('profile')->group(function () {
            Route::get('', 'show_profile');
            Route::put('', 'update_profile');
            Route::post('change-photo', 'change_photo');
        });

        // Change password
        Route::put('change-password', 'change_password');
    });
});
