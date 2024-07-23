<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// They are the same
// Route::get('/', function () {
//     return view('posts.index');

// Route::get('/register', function (){
//     return view('auth.register');


// Route::view('/', 'posts.index')->name('home');
Route::redirect('/', 'posts')->name('home');

// php artisan route:list - connects to the PostController routes
Route::resource('posts', PostController::class);

// USERS POST Route - user/posts the path on the dashboard controller
// keep in mind the user will be dinamic {}
Route::get('{user}/posts', [DashboardController::class, 'userPosts'])->name('posts.user');





// AUTH GROUP
Route::middleware('auth')->group(function() {
    // index method inside dashboardController will handle the get request for /dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

    Route::post('/logout', [AuthController::class,'logout'])->name('logout');
});



// GUEST GROUP
Route::middleware('guest')->group(function() {
    // REGISTER
    Route::view('/register', 'auth.register')->name('register');
// need to import!!
    Route::post('/register', [AuthController::class, 'register']);

// LOGIN
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});


