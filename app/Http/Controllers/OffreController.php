<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Offre;
use Illuminate\Support\Facades\Auth;


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
        

        $table->integer('user_id')->nullable();
        $table->integer('categorie_offre_id')->nullable();
        $table->string('titre')->nullable();
        $table->text('description')->nullable();
        $table->string('type_contrat')->nullable();
        $table->text('description_profil')->nullable();
        $table->string('sexe')->nullable();
        $table->integer('salaire_min')->nullable();
        $table->integer('salaire_max')->nullable();
        $table->integer('experience_min')->nullable();
        $table->integer('experience_max')->nullable();
        $table->text('competence_requise')->nullable();
        $table->string('pays')->nullable();
        $table->string('ville')->nullable();
        $table->date('date_expiration')->nullable();


        Offre::create([

            "user_id" => $request->user_id,
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
}
