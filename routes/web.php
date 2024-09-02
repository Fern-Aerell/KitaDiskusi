<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('index', ['isLogin' => Auth::check()]);
})->name('index');

Route::middleware(['guest'])->group(function() {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.auth');

    Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
    Route::post('/signup', [AuthController::class, 'store'])->name('signup.store');

});

Route::middleware(['auth'])->group(function() {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});