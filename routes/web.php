<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;

//
//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', [TweetController::class, 'index'])->name('home');

//Route::resource('tweet', TweetController::class)
//    ->only('destroy')
//    ->middleware('auth');

Route::middleware('auth')->group(function (){
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
//    Route::get('/user/',[\App\Http\Controllers\UserController::class, 'name'])->name('name');
    Route::get('/user',[\App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::get('/post',[\App\Http\Controllers\TweetController::class, 'post',])->name('post');
    Route::post('/post/check',[\App\Http\Controllers\TweetController::class, 'post_check',])->name('post_check');
    Route::get('/delete/{id}',[\App\Http\Controllers\TweetController::class, 'destroy'])->name('destroy');
});

Route::middleware('guest')->group(function (){
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login_proc', [\App\Http\Controllers\AuthController::class, 'login'])->name('login_proc');

    Route::get('/signup', [\App\Http\Controllers\AuthController::class, 'showSignupForm'])->name('signup');
    Route::post('/signup_proc', [\App\Http\Controllers\AuthController::class, 'signup'])->name('signup_proc');
});







