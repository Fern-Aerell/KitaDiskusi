<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('index', ['isLogin' => Auth::check()]);
})->name('index');

Route::get('/question', function() {
    return view('question', ['isLogin' => Auth::check()]);
})->name('question');

Route::middleware(['guest'])->group(function() {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.auth');

    Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
    Route::post('/signup', [AuthController::class, 'store'])->name('signup.store');

});

Route::middleware(['auth'])->group(function() {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/profile', function() {
        return view('profile');
    })->name('profile');

});