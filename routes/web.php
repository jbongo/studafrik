<?php
use App\Http\Controllers\LoginController;

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;
Use App\Models\CategorieOffre;
Use App\Models\Pays;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $categories = CategorieOffre::all();
    $pays = Pays::all();
    return view('dashboard', compact('categories','pays'));
})->name('dashboard');

// ##USER
Route::post('user/store','UserController@store')->name('user.store')->middleware('auth');
Route::post('user/update','UserController@update')->name('user.update')->middleware('auth');
Route::post('user/change_password','UserController@change_password')->name('user.change_password');
Route::post('user/photo_profil','UserController@photoProfile')->name('user.photo_profil');
Route::get('user/show_profil/{user_id}','UserController@show_profil')->name('user.show_profil');


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

// CV

Route::middleware('auth')->group(function () {
    Route::get('cv','CvController@index')->name('cv.index');

    Route::get('cv/formation/create','CvController@create_formation')->name('cv.formation.create');
    Route::get('cv/experience/create','CvController@create_experience')->name('cv.experience.create');
    Route::get('cv/competence/create','CvController@create_competence')->name('cv.competence.create');

    Route::post('cv/formation/store','CvController@store_formation')->name('cv.formation.store');
    Route::post('cv/experience/store','CvController@store_experience')->name('cv.experience.store');
    Route::post('cv/competence/store','CvController@store_competence')->name('cv.competence.store');

    Route::get('cv/formation/edit/{formation_id}','CvController@edit_formation')->name('cv.formation.edit');
    Route::get('cv/experience/edit/{experience_id}','CvController@edit_experience')->name('cv.experience.edit');
    Route::get('cv/competence/edit/{competence_id}','CvController@edit_competence')->name('cv.competence.edit');

    Route::post('cv/formation/update/{formation_id}','CvController@update_formation')->name('cv.formation.update');
    Route::post('cv/experience/update/{experience_id}','CvController@update_experience')->name('cv.experience.update');
    Route::post('cv/competence/update/{competence_id}','CvController@update_competence')->name('cv.competence.update');

    Route::get('cv/formation/delete/{formation_id}','CvController@delete_formation')->name('cv.formation.delete');
    Route::get('cv/experience/delete/{experience_id}','CvController@delete_experience')->name('cv.experience.delete');
    Route::get('cv/competence/delete/{competence_id}','CvController@delete_competence')->name('cv.competence.delete');


    // ##Recruteur 

    Route::get('cv/liste','CvController@liste')->name('cv.liste');

});


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


// ############################# ROUTES ADMIN ##################################

Route::get('adminlog/','UserController@admin_login')->name('admin.login');
Route::post('/admin/login','LoginController@authenticate')->name('admin.login_store');



Route::middleware([Admin::class])->group(function () {
    Route::get('admin/dashboard','HomeController@admin_dashboard')->name('admin.dashboard');


    // Catégories
    Route::get('admin/categorie-offre','CategorieOffreController@index')->name('admin.categorie_offre.index');
    Route::post('admin/categorie-offre/store','CategorieOffreController@store')->name('admin.categorie_offre.store');
    Route::post('admin/categorie-offre/update/{offre}','CategorieOffreController@update')->name('admin.categorie_offre.update');
    Route::post('admin/categorie-offre/delete/{offre}','CategorieOffreController@delete')->name('admin.categorie_offre.delete');

    
    // Pays
    Route::get('admin/pays','PaysController@index')->name('admin.pays.index');
    Route::post('admin/pays/store','PaysController@store')->name('admin.pays.store');
    Route::post('admin/pays/update/{offre}','PaysController@update')->name('admin.pays.update');
    Route::post('admin/pays/delete/{offre}','PaysController@delete')->name('admin.pays.delete');


    // Blog -> articles

    Route::get('admin/articles','ArticleController@index_admin')->name('admin.article.index');
    Route::get('admin/articles/add','ArticleController@create_admin')->name('admin.article.create');
    Route::get('admin/articles/edit/{offre}','ArticleController@edit_admin')->name('admin.article.edit');
    Route::post('admin/articles/store','ArticleController@store_admin')->name('admin.article.store');
    Route::post('admin/articles/update/{offre}','ArticleController@update_admin')->name('admin.article.update');
    Route::post('admin/articles/delete/{offre}','ArticleController@delete_admin')->name('admin.article.delete');
    
    
    // offres

    Route::get('admin/offres','OffreController@index_admin')->name('admin.offres.index');    
    Route::get('admin/ajout-offre','OffreController@create_admin')->name('admin.offre.create');
    Route::post('admin/ajout-offre','OffreController@store_admin')->name('admin.offre.store');
    Route::get('admin/edit-offre/{offre_id}','OffreController@edit_admin')->name('admin.offre.edit');
    Route::post('admin/update-offre/{offre_id}','OffreController@update_admin')->name('admin.offre.update');
    Route::get('admin/delete-offre/{offre_id}','OffreController@destroy_admin')->name('admin.offre.delete');
    
    
    
    
    
});