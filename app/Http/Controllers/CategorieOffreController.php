<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categorieoffre;
use Illuminate\Support\Facades\Crypt;
class CategorieOffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorieoffre::all();


        return view('admin.configuration.categorie_offre.index',compact('categories'));

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

        $request->validate([
            
            'nom' => 'required|string|unique:categorieoffres',
          
        ]);

    

        Categorieoffre::create([
            "nom"=>$request->nom
        ]);

        // return redirect::back()->with('_ok', "");
        return redirect()->route('admin.categorie_offre.index')->with('ok', __("Nouvelle catégorie ajoutée ")  );

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
    public function update(Request $request, $offre)
    {
        $categorie = Categorieoffre::where('id',Crypt::decrypt($offre))->first();

        if($categorie->nom != $request->nom){
            $request->validate([
            
                'nom' => 'required|string|unique:categorieoffres',
              
            ]);
        }

        $categorie->nom = $request->nom ;

        $categorie->update();

        return redirect()->route('admin.categorie_offre.index')->with('ok', "Catégorie modifiée");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($offre)
    {


        Categorieoffre::destroy(Crypt::decrypt($offre));

        return "ok";
        // return redirectroute('admin.categorie_offre.index')->with('ok', "Catégorie supprimée");
    }
}
