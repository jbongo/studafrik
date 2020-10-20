<?php
use App\Http\Controllers\LoginController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::post('/login','LoginController@authenticate')->name('login');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// ##USER
Route::post('user/store','UserController@store')->name('user.store')->middleware('auth');
Route::post('user/update','UserController@update')->name('user.update')->middleware('auth');
Route::post('user/change_password','UserController@change_password')->name('user.change_password');

// offres

Route::get('mes-offres','OffreController@index')->name('mes_offres.index')->middleware('auth');
Route::get('ajout-offre','OffreController@create')->name('mes_offres.create')->middleware('auth');
Route::post('ajout-offre','OffreController@store')->name('mes_offres.store')->middleware('auth');
Route::post('update-offre','OffreController@update')->name('mes_offres.update')->middleware('auth');
Route::post('delete-offre','OffreController@delete')->name('mes_offres.delete')->middleware('auth');

