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

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');
Route::get('/','HomeController@index')->name('welcome');

Route::post('user/store','UserController@store')->name('user.store')->middleware('auth');

// Route::post('/login','LoginController@authenticate')->name('login');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// ##USER
Route::post('user/store','UserController@store')->name('user.store')->middleware('auth');
Route::post('user/update','UserController@update')->name('user.update')->middleware('auth');
Route::post('user/change_password','UserController@change_password')->name('user.change_password');
Route::post('user/photo_profil','UserController@photoProfile')->name('user.photo_profil');


Route::get('recruteur/profile','UserController@profilRecruteur')->name('user.profil_recruteur');

// offres

Route::get('mes-offres','OffreController@index')->name('mes_offres.index')->middleware('auth');
Route::get('offres-emplois','OffreController@offres_emplois')->name('offres_emplois');
Route::get('recherche-emplois','OffreController@recherche_emplois')->name('recherche_emplois');

Route::get('ajout-offre','OffreController@create')->name('mes_offres.create')->middleware('auth');
Route::post('ajout-offre','OffreController@store')->name('mes_offres.store')->middleware('auth');
Route::get('edit-offre/{offre_id}','OffreController@edit')->name('mes_offres.edit')->middleware('auth');
Route::post('update-offre/{offre_id}','OffreController@update')->name('mes_offres.update')->middleware('auth');
Route::get('delete-offre/{offre_id}','OffreController@destroy')->name('mes_offres.delete')->middleware('auth');
Route::get('offre/{offre_id}','OffreController@show')->name('mes_offres.show');

// Candidature
Route::get('postuler/{offre_id}','OffreController@create_postuler')->name('postuler.create')->middleware('auth');
Route::post('postuler/{offre_id}','OffreController@store_postuler')->name('postuler.store')->middleware('auth');

Route::get('candidatures','CandidatureController@index')->name('candidatures.index')->middleware('auth');


// Blog
Route::get('blog','ArticleController@index')->name('blog.index');
Route::get('article/{article_id}','ArticleController@article_show')->name('article.show');


// Qui sommes nous

Route::get('/qui-sommes-nous', function () {
    return view('qui_sommes_nous');
})->name('qui_sommes_nous');

//  Nous contacter

Route::get('/nous-contacter', function () {
    return view('nous_contacter');
})->name('nous_contacter');