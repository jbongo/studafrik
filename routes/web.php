<?php
use App\Http\Controllers\LoginController;

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;
Use App\Models\Categorieoffre;
Use App\Models\Pays;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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




Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');






Route::post('user/store','UserController@store')->name('user.store')->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $categories = Categorieoffre::all();
    $pays = Pays::all();
    return view('dashboard', compact('categories','pays'));
})->name('dashboard');

// ##USER
Route::post('user/store','UserController@store')->name('user.store')->middleware('auth');
Route::post('user/update','UserController@update')->name('user.update')->middleware('auth');
Route::post('user/change_password','UserController@change_password')->name('user.change_password');
Route::post('user/photo_profil','UserController@photoProfile')->name('user.photo_profil');
Route::get('user/show_profil/{user_id}','UserController@show_profil')->name('user.show_profil');

// Télecharger CV du candidat
Route::get('user/telecharger_cv/{user_id}','UserController@telecharger_cv')->name('user.telecharger_cv');



Route::get('recruteur/profile','UserController@profilRecruteur')->name('user.profil_recruteur');
// Bibliotheque de recruteurs
Route::get('recruteur/bibliotheque','UserController@bibliothequeRecruteur')->name('user.bibliotheque.index');
Route::get('recruteur/bibliotheque/{recruteur_id}','UserController@showBibliothequeRecruteur')->name('user.bibliotheque.show');


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

Route::get('slug','OffreController@convert_to_slug')->name('convert_to_slug');


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

    Route::get('cv/liste/{mot_cle?}/{pays?}','CvController@liste')->name('cv.liste');

    // Favoris
    Route::get('favoris/cv/{recruteur_id}/{candidat_id}','FavoriscvController@store')->name('favoris.cv');
    Route::get('favoris/cv','FavoriscvController@index')->name('favoris.cv.index');
    Route::get('favoris/cv/delete/{recruteur_id}/{candidat_id}','FavoriscvController@destroy')->name('favoris.cv.delete');

    Route::get('favoris/offre/{user_id}/{offre_id}','FavorisoffreController@store')->name('favoris.offre');
    Route::get('favoris/offre','FavorisoffreController@index')->name('favoris.offre.index');
    Route::get('favoris/offre/delete/{user_id}/{offre_id}','FavorisoffreController@destroy')->name('favoris.offre.delete');



});


// Blog
Route::get('blog','ArticleController@index')->name('blog.index');
Route::get('article/{article_id}','ArticleController@article_show')->name('article.show');

Route::get('article-slug','ArticleController@convert_to_slug')->name('article.convert_to_slug');



// Commentaires
Route::post('article/add-commentaire/{article_id}','ArticleController@add_commentaire')->name('article.add_commentaire');


// Qui sommes nous

Route::get('/qui-sommes-nous', function () {
    return view('qui_sommes_nous');
})->name('qui_sommes_nous');

// FAQ

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

//  Nous contacter

Route::get('/nous-contacter', function () {
    return view('nous_contacter');
})->name('nous_contacter');
Route::post('/nous-contacter','ContactController@store')->name('contact.store');



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
    // Liste des commentaires d'un article
    Route::get('admin/article/{article_id}/commentaires','ArticleController@commentaire_admin')->name('admin.article.commentaires');

    
    
    // offres

    Route::get('admin/offres','OffreController@index_admin')->name('admin.offres.index');    
    Route::get('admin/ajout-offre','OffreController@create_admin')->name('admin.offre.create');
    Route::post('admin/ajout-offre','OffreController@store_admin')->name('admin.offre.store');
    Route::get('admin/edit-offre/{offre_id}','OffreController@edit_admin')->name('admin.offre.edit');
    Route::post('admin/update-offre/{offre_id}','OffreController@update_admin')->name('admin.offre.update');
    Route::get('admin/delete-offre/{offre_id}','OffreController@destroy_admin')->name('admin.offre.delete');
    Route::get('admin/archiver-offre/{offre_id}','OffreController@archiver_admin')->name('admin.offre.archiver');

    Route::get('admin/offres/archives','OffreController@archives_admin')->name('admin.offres.archive');    
    
    // Commentaires
    
    Route::get('admin/commentaires','CommentaireController@index')->name('admin.commentaires.index');
    Route::get('admin/commentaire/valider/{commentaire_id}','CommentaireController@valider')->name('admin.commentaire.valider');
    Route::get('admin/commentaire/supprimer/{commentaire_id}','CommentaireController@delete')->name('admin.commentaire.delete');

    // Candidats

    Route::get('admin/candidats','UserController@index_candidat')->name('admin.candidat.index');    
    Route::get('admin/candidat/create','UserController@create_candidat')->name('admin.candidat.create');    
    Route::post('admin/candidat/add','UserController@add_candidat')->name('admin.candidat.add');    
    Route::get('admin/candidat/edit/{candidat_id}','UserController@edit_candidat')->name('admin.candidat.edit');   
    Route::post('admin/candidat/update/{candidat_id}','UserController@update_candidat')->name('admin.candidat.update');    
    Route::post('admin/candidat/delete/{candidat_id}','UserController@delete_candidat')->name('admin.candidat.delete');    


    // recruteurs

    Route::get('admin/recruteurs','UserController@index_recruteur')->name('admin.recruteur.index');    
    Route::get('admin/recruteur/create','UserController@create_recruteur')->name('admin.recruteur.create');    
    Route::post('admin/recruteur/add','UserController@add_recruteur')->name('admin.recruteur.add');    
    Route::get('admin/recruteur/edit/{recruteur_id}','UserController@edit_recruteur')->name('admin.recruteur.edit');   
    Route::post('admin/recruteur/update/{candidat_id}','UserController@update_recruteur')->name('admin.recruteur.update');    
    Route::post('admin/recruteur/delete/{recruteur_id}','UserController@delete_recruteur')->name('admin.recruteur.delete');    

    

    
    
});