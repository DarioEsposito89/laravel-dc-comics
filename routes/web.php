<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComicController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// HOME
Route::get('/', function () {
    return view('home');
})->name('home');

// INDEX
Route::get('/comics', [ComicController::class, 'index'])->name('comics.index');

// CREATE
Route::get('/comics/create', [ComicController::class, 'create'])->name('comics.create');

// SHOW
Route::get('/comics/{id}', [ComicController::class, 'show'])->name('comics.show');

// STORE
Route::post('/comics',[ComicController::class, 'store'])->name('comics.store');

// EDIT
Route::get('/comics/{comic}/edit',[ComicController::class, 'edit'])->name('comics.edit');

// UPDATE
Route::put('/comics/{comic}',[ComicController::class, 'update'])->name('comics.update');

// DESTROY
Route::delete('/comics/{comic}', [ComicController::class, 'destroy'])->name('comics.destroy');





// OTHERS ROOUTE LINK
Route::get('/characters', function () {
    return view('characters');
})->name('characters');


Route::get('/movies', function () {
    return view('movies');
})->name('movies');

Route::get('/tv', function () {
    return view('tv');
})->name('tv');

Route::get('/games', function () {
    return view('games');
})->name('games');

Route::get('/collections', function () {
    return view('collections');
})->name('collections');
