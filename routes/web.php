<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PostController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Login
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'store']);

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
->name('dashboard');

//Posts
Route::get('/posts', [PostController::class, 'index'])->name('posts');

// Logout
Route::post ('/logout', [LogoutController::class, 'logout'])->name('logout');