<?php

use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;



Route::post('login', [ApiLoginController::class, 'login'])->name('api.login');


Route::middleware('auth:sanctum')->group(function () {
    Route::get('posts', [PostController::class, 'index'])->name('api.posts.index');
});
