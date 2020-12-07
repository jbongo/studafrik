<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cv_formation;
use App\Models\Cv_experience;
use App\Models\Cv_competence;
use Illuminate\Support\Facades\Crypt;

use Auth;

class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $formations = Cv_formation::where('user_id', Auth::user()->id)->get();
        $experiences = Cv_experience::where('user_id', Auth::user()->id)->get();
        $competences = Cv_competence::where('user_id', Auth::user()->id)->get();

        $user = Auth::user();

        // $user->offres()->attach([1,2]);
        return view('candidat.cv.index',compact('formations','experiences','competences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_formation()
    {
        return view('candidat.cv.add_formation');
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_experience()
    {
        return view('candidat.cv.add_experience');
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_competence()
    {
        return view('candidat.cv.add_competence');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_formation(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "libelle" => 'string|required',
            "ets" => 'string|required',
            "date_deb" => 'date|required',
            "date_fin" => 'date|required',
        ]);
        Cv_formation::create([
            "user_id"=> Auth::user()->id,
            "libelle" => $request->libelle,
            "ets" => $request->ets,
            "date_deb" => $request->date_deb,
            "date_fin" => $request->date_fin,
            "description" => $request->description,
        ]);

        return redirect()->route('cv.index')->with('ok','Formation ajoutée');
    }
       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_experience(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "titre" => 'string|required',
            "nom_entreprise" => 'string|required',
            "date_deb" => 'date|required',
            "date_fin" => 'date|required',
        ]);
        Cv_experience::create([
            "user_id"=> Auth::user()->id,
            "titre" => $request->titre,
            "nom_entreprise" => $request->nom_entreprise,
            "date_deb" => $request->date_deb,
            "date_fin" => $request->date_fin,
            "description" => $request->description,
        ]);

        return redirect()->route('cv.index')->with('ok','Expérience ajoutée');

    }



       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_competence(Request $request)
    {
            //  dd($request->all());
             $request->validate([
                "libelle" => 'string|required',
               
            ]);
            Cv_competence::create([
                "user_id"=> Auth::user()->id,
                "libelle" => $request->libelle,
                
            ]);
    
            return redirect()->route('cv.index')->with('ok','Compétence ajoutée');
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
    public function edit_formation($id)
    {
        $formation = Cv_formation::where('id', Crypt::decrypt($id))->first();

        return view('candidat.cv.edit_formation', compact('formation'));
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_experience($id)
    {
        $experience = Cv_experience::where('id', Crypt::decrypt($id))->first();

        return view('candidat.cv.edit_experience', compact('experience'));
    }


        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_competence($id)
    {
        $competence = Cv_competence::where('id', Crypt::decrypt($id))->first();

        return view('candidat.cv.edit_competence', compact('competence'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_formation(Request $request, $id)
    {
           // dd($request->all());
        $request->validate([
            "libelle" => 'string|required',
            "ets" => 'string|required',
            "date_deb" => 'date|required',
            "date_fin" => 'date|required',
        ]);

        $formation = Cv_formation::where('id', Crypt::decrypt($id))->first();

       
           
            $formation->libelle = $request->libelle;
            $formation->ets = $request->ets;
            $formation->date_deb = $request->date_deb;
            $formation->date_fin = $request->date_fin;
            $formation->description = $request->description;

            $formation->update();
     

        return redirect()->route('cv.index')->with('ok','Formation Modifiée');
    }

       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_experience(Request $request, $id)
    {
                   // dd($request->all());
                $request->validate([
                    "titre" => 'string|required',
                    "nom_entreprise" => 'string|required',
                    "date_deb" => 'date|required',
                    "date_fin" => 'date|required',
                ]);
        
                $experience = Cv_experience::where('id', Crypt::decrypt($id))->first();
        
               
                   
                    $experience->titre = $request->titre;
                    $experience->nom_entreprise = $request->nom_entreprise;
                    $experience->date_deb = $request->date_deb;
                    $experience->date_fin = $request->date_fin;
                    $experience->description = $request->description;
        
                    $experience->update();
             
        
                return redirect()->route('cv.index')->with('ok','Expérience Modifiée');
    }


       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_competence(Request $request, $id)
    {
            // dd($request->all());
            $request->validate([
                "libelle" => 'string|required',
            ]);
    
            $competence = Cv_competence::where('id', Crypt::decrypt($id))->first();
    
            
                
                $competence->libelle = $request->libelle;
    
                $competence->update();
            
    
            return redirect()->route('cv.index')->with('ok','Expérience Modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_formation($id)
    {
        $formation = Cv_formation::where('id', Crypt::decrypt($id))->first();
        $formation->delete();
        return redirect()->route('cv.index')->with('ok','Formation Supprimée');

        
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_experience($id)
    {
        $experience = Cv_experience::where('id', Crypt::decrypt($id))->first();
        $experience->delete();
        return redirect()->route('cv.index')->with('ok','Expérience Supprimée');
    }


        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_competence($id)
    {
        $competence = Cv_competence::where('id', Crypt::decrypt($id))->first();
        $competence->delete();
        return redirect()->route('cv.index')->with('ok','Compétence Supprimée');
    }
}
