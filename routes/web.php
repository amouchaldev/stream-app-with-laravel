<?php

use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SerieController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('main.index');
// })->name('main');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('series', SerieController::class);

Route::resource('episodes', EpisodeController::class);

Route::get('episodes/{serie}/{season}', [EpisodeController::class, 'getEpisodesBySeason']);

Route::resource('movies', MovieController::class);


Route::get('/', [MainController::class, 'index'])->name('main');

// Route::get('random/{type}', [MainController::class, 'random']);
// Route::get('random/series', [MainController::class, 'fetchRandomSeries']);

// Route::get('latest/{movies}', [MainController::class, 'latest']);



Route::get('/movie/{id}', [MovieController::class, "player"])->name('movie');
Route::get('/tv/{ep}', [EpisodeController::class, "player"])->name('tv');

Route::get('/genre/{name}', [GenreController::class, "show"])->name('genre');

Route::get('/fetch/{key?}', [MainController::class, 'fetch']);
Route::get('/search/{key?}', [MainController::class, 'search'])->name('search');

// Route::get('/player', function () {
//     return view('main.player');
// });

// Route::get('movies', [MoviesController::class, "inde"])