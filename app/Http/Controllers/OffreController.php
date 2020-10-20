<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Offre;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Crypt;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offres = Offre::where('id', Auth::user()->id)->get();

        return view('offre.index', compact('offres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offre.add');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

    //    dd($request);

        Offre::create([

            "user_id" => Auth::user()->id,
            "categorie_offre_id" => $request->categorie_offre_id,
            "titre" => $request->titre,
            "description" => $request->description,
            "type_contrat" => $request->type_contrat,
            "description_profil" => $request->description_profil,
            "sexe" => $request->sexe,
            "salaire_min" => $request->salaire_min,
            "salaire_max" => $request->salaire_max,
            "experience_min" => $request->experience_min,
            "experience_max" => $request->experience_max,
            "competence_requise" => $request->competence_requise,
            "pays" => $request->pays,
            "ville" => $request->ville,
            "date_expiration" => $request->date_expiration,

        ]);


        return redirect()->route('mes_offres.index')->with('ok', __("Nouvelle offre ajoutée")  );



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
        $offre = Offre::where('id', Crypt::decrypt($id))->first();

        return view('offre.show', compact('offre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offre = Offre::where('id', Crypt::decrypt($id))->first();

        return view('offre.edit', compact('offre'));
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
      
        $offre = Offre::where('id', Crypt::decrypt($id))->first();


    
        $offre->categorie_offre_id = $request->categorie_offre_id ;
        $offre->titre = $request->titre ;
        $offre->description = $request->description ;
        $offre->type_contrat = $request->type_contrat ;
        $offre->description_profil = $request->description_profil ;
        $offre->sexe = $request->sexe ;
        $offre->salaire_min = $request->salaire_min ;
        $offre->salaire_max = $request->salaire_max ;
        $offre->experience_min = $request->experience_min ;
        $offre->experience_max = $request->experience_max ;
        $offre->competence_requise = $request->competence_requise ;
        $offre->pays = $request->pays ;
        $offre->ville = $request->ville ;
        $offre->date_expiration = $request->date_expiration ;


        $offre->update();
        return redirect()->route('mes_offres.index')->with('ok', __("Votre offre a été mise à jour ")  );



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
        $offre = Offre::where('id', Crypt::decrypt($id))->first();

      return   $offre->delete();
        
    }
}
