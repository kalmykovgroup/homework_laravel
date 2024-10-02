<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ImageController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('home', ["phone" => config('company.phone'), "email" => config('company.email')]);
});

Route::get('/home', function () {
    return view('home', ["phone" => config('company.phone'), "email" => config('company.email')]);
})->name("home");

Route::get('/registration',[RegistrationController::class, 'index'])->name("registration");

Route::get('/login',[LoginController::class, 'index'])->name("login");

Route::get('/about', function () {return view('about');})->name("about");

Route::get('/recover_password', [LoginController::class, 'recover_password'])->name("recover.password");



Route::post('/registration', [RegistrationController::class, 'store'])->name("registration.store");


Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
Route::post('/feedback', [FeedbackController::class, 'post'])->name('feedback.post');


Route::post('/login', [LoginController::class, 'login'])->name("login.login");

Route::get('/recover', [LoginController::class, 'recover'])->name("login.recover");
Route::post('/recover_password', [LoginController::class, 'recover_password'])->name("login.recover_password");

Route::post('/image', [imageController::class, 'image'])->withoutMiddleware(VerifyCsrfToken::class);






