<?php

use App\Http\Controllers\ApiCommentController;
use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\ApiPostController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

Route::post('login', [ApiLoginController::class, 'login'])->name('api.login');


Route::middleware('auth:sanctum')->group(function (Router $request) {
    Route::get('posts', [PostController::class, 'index'])->name('api.posts.index');

});


Route::post('posts/create', [ApiPostController::class, 'create'])->name('api.posts.create');
Route::post('comments/create', [ApiCommentController::class, 'create'])->name('api.comments.create');

