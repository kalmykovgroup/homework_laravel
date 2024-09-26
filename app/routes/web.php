<?php

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


Route::post('/registration', [RegistrationController::class, 'store'])->name("registration.store");


Route::get('/login',[LoginController::class, 'index'])->name("login");


Route::post('/login', [LoginController::class, 'login'])->name("login.login");


Route::get('/about', function () {
    return view('about');
})->middleware('auth');
 
 
 
 