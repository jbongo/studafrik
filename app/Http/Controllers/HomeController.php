<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Offre;
Use App\Models\Article;
Use App\Models\Categorieoffre;
Use App\Models\Pays;
Use App\Models\User;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offres = Offre::where('active', true)->orderBy('id','desc')->limit(6)->get();
        $articles = Article::where('actif', true)->orderBy('id','desc')->limit(6)->get();
        $categories = Categorieoffre::all();
        $pays = Pays::all();

        $nb_offre_industrie =  Offre::where([['categorieoffre_id', 13], ['archive',false],['active',true]])->count();
        $nb_offre_banque =  Offre::where([['categorieoffre_id', 5], ['archive',false],['active',true]])->count();
        $nb_offre_education =  Offre::where([['categorieoffre_id', 9], ['archive',false],['active',true]])->count();
        $nb_offre_pub =  Offre::where([['categorieoffre_id', 17], ['archive',false],['active',true]])->count();

        // dd($offres);
        return view('welcome', compact('offres','articles', 'categories', 'pays','nb_offre_industrie','nb_offre_banque','nb_offre_pub','nb_offre_education',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

// ##################### ADMIN

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_dashboard()
    {

    
        $nb_offres_actives = Offre::where('archive', false)->count();
        $nb_candidats = User::where('role','candidat')->count();
        $nb_recruteurs = User::where('role','recruteur')->count();
        $nb_articles = Article::count();

        $candidatures = Offre::candidatures();
        $nb_candidatures = sizeof($candidatures);

       return view('admin.dashboard', compact('nb_offres_actives','nb_candidats','nb_recruteurs','candidatures','nb_candidatures','nb_articles'));
    }




}
