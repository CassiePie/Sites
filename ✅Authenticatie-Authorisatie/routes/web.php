<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CommentsController;

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


Route::redirect('/', '/posts');

Route::middleware(['auth'])->group(function () {
    Route::resource('/posts', PostsController::class);
    Route::resource('/comments', CommentsController::class)->except(['index', 'show']);
    Route::get('/profile', [UsersController::class, 'profile'])->name('users.profile');
    Route::get('/profile/{user:username}', [UsersController::class, 'show'])->name('users.show');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login.get');
    Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.post');
    Route::get('/register', [AuthController::class, 'register'])->name('register.get');
    Route::post('/register', [AuthController::class, 'handleRegister'])->name('register.post');
    // dd('register.post route hit');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout.post')->middleware('auth');
