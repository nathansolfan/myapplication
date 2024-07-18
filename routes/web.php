<?php

use Illuminate\Support\Facades\Route;

// They are the same
// Route::get('/', function () {
//     return view('posts.index');
// })->name('home');

Route::view('/', 'posts.index')->name('home');

Route::get('/register', function (){
    return view('auth.register');
})->name('register');