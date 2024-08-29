<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function () {
//     return view('home');
// });

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/quest/detail', function () {
    return view('quest.detail');
})->name('quest.detail');