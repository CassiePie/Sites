<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\PublishersController;

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


Route::get('games/{game}/delete', [GamesController::class, 'delete'])->name('games.delete');
Route::get('publishers/{publisher}/delete', [PublishersController::class, 'delete'])->name('publishers.delete');
Route::get('games/{game}/edit', [GamesController::class, 'edit'])->name('games.edit');
Route::put('/publishers/{id}', [PublishersController::class, 'update'])->name('publishers.update');
Route::post('/publishers', [PublishersController::class, 'store'])->name('publishers.store');


Route::resources([
    'games' => GamesController::class,
    'publishers' => PublishersController::class,
]);

Route::redirect('/', route('games.index'));
