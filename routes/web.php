<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieLayoutController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/movie','App\Http\Controllers\MovieLayoutController@movie');

Route::get('/theloai/{id}', [MovieLayoutController::class, 'showGenre'])
     ->name('movies.genre');

Route::get('/details/{id}', [MovieLayoutController::class, 'showDetails'])
     ->name('movie.details');