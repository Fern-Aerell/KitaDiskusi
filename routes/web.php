<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/question/{id}', [TopicController::class, 'index'])->name('question');

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

    Route::post('/topic/store', [TopicController::class, 'store'])->name('topic.store');

    Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');

    Route::post('/comment/vote', [CommentController::class, 'vote'])->name('comment.vote');

});