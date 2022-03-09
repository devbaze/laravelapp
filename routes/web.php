<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\KategorijaController;
use App\Http\Controllers\Admin\FilmController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\KorpaController;
use Illuminate\Support\Facades\Auth;

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
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'index']);
Route::get('kategorije', [FrontendController::class, 'kategorije']);
Route::get('kategorija/{slug}', [FrontendController::class, 'pregledkategorije']);
Route::get('kategorija/{kategorija_slug}/{film_slug}', [FrontendController::class, 'pregledfilma']);

Auth::routes();

Route::post('dodaj-u-korpu', [KorpaController::class, 'dodajFilm']);
Route::post('obrisi-film-iz-korpe', [KorpaController::class, 'obrisifilm']);
Route::middleware(['auth'])->group(function () {
    Route::get('korpa', [KorpaController::class, 'pogledaj']);
});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\Admin\FrontendController@index');

    Route::get('adminkategorije', 'App\Http\Controllers\Admin\KategorijaController@adminkategorije');
    Route::get('dodaj-kategoriju', 'App\Http\Controllers\Admin\KategorijaController@dodajkategoriju');
    Route::post('insert-kategoriju', 'App\Http\Controllers\Admin\KategorijaController@insertkategoriju');
    Route::get('uredi-kategoriju/{id}', [KategorijaController::class, 'uredikategoriju']);
    Route::put('spremi-kategoriju/{id}', [KategorijaController::class, 'spremikategoriju']);
    Route::get('obrisi-kategoriju/{id}', [KategorijaController::class, 'obrisikategoriju']);



    // filmovi
    Route::get('adminfilmovi', [FilmController::class, 'adminfilmovi']);
    Route::get('dodaj-film', [FilmController::class, 'dodaj']);
    Route::post('insert-film', [FilmController::class, 'insert']);
    
    
    Route::get('uredi-film/{id}', [FilmController::class, 'uredi']);
    Route::put('spremi-film/{id}', [FilmController::class, 'spremi']);
    //Route::get('obrisi-film/{id}', FilmController::class . '@obrisi');
});