<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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

//in terminal: php artisan make:controller Contactcontroller
//route mkae: Route::ger(...)
//function in controller  -> contact
//view in views map -> contact.blade.php


//url -> controller -> function
Route::get('/', [TestController::class, 'home'])->name('home');
Route::get ('/about', [TestController::class, 'about'])->name('about');
Route::get ('/contact', [TestController::class, 'contact'])->name('contact');
Route::get ('/user/{username}', [TestController::class, 'user'])->name('user-profile');


