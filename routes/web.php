<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// They are the same
// Route::get('/', function () {
//     return view('posts.index');

// Route::get('/register', function (){
//     return view('auth.register');



Route::view('/', 'posts.index')->name('home');

// REGISTER
Route::view('/register', 'auth.register')->name('register');
// need to import!!
Route::post('/register', [AuthController::class, 'register']);

// LOGIN
Route::view('/login', 'auth.login')->name('login');
