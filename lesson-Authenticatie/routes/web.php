<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodoController::class, 'index'])->name('todos.index')->middleware('auth');
Route::post('/', [TodoController::class, 'store'])->name('todos.store')->middleware('auth');
Route::put('/{todo}', [TodoController::class, 'toggle'])->name('todos.toggle')->middleware('auth');
Route::delete('/{todo}', [TodoController::class, 'destroy'])->name('todos.delete')->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login.get')->middleware('guest');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.post')->middleware('guest');
Route::get('/register', [AuthController::class, 'register'])->name('register.get')->middleware('guest');
Route::post('/register', [AuthController::class, 'handleRegister'])->name('register.post')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
