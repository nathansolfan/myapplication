<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// They are the same
// Route::get('/', function () {
//     return view('posts.index');

// Route::get('/register', function (){
//     return view('auth.register');



Route::view('/', 'posts.index')->name('home');

// index method inside dashboardController will handle the get request for /dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/logout', [AuthController::class,'logout'])->name('logout');




// REGISTER
Route::view('/register', 'auth.register')->name('register');
// need to import!!
Route::post('/register', [AuthController::class, 'register']);

// LOGIN
Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthController::class, 'login']);

