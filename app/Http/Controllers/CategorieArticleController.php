<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoriearticle;
use Illuminate\Support\Facades\Crypt;


class CategorieArticleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categoriearticle::all();


        return view('admin.configuration.categorie_article.index',compact('categories'));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            
            'nom' => 'required|string|unique:categoriearticles',
          
        ]);

    

        Categoriearticle::create([
            "nom"=>$request->nom
        ]);

        // return redirect::back()->with('_ok', "");
        return redirect()->route('admin.categorie_article.index')->with('ok', __("Nouvelle catégorie ajoutée ")  );

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
    public function update(Request $request, $article)
    {
        $categorie = Categoriearticle::where('id',Crypt::decrypt($article))->first();

        if($categorie->nom != $request->nom){
            $request->validate([
            
                'nom' => 'required|string|unique:categoriearticles',
              
            ]);
        }

        $categorie->nom = $request->nom ;

        $categorie->update();

        return redirect()->route('admin.categorie_article.index')->with('ok', "Catégorie modifiée");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($article)
    {


        Categoriearticle::destroy(Crypt::decrypt($article));

        
        return redirect()->route('admin.categorie_article.index')->with('ok', "Catégorie supprimée");
    }

    
}
