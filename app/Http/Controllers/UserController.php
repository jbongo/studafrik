<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
       

        $user = User::where('id', Auth::user()->id)->first();
        if($user->role == "candidat"){

            // 'photo' => 'mimes:jpeg,bmp,png'

            $request->validate([

                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'poste' => 'required|string|max:255',
               
                'date_naissance' => 'required|date|max:255',
                'pays' => 'required|string|max:255',
                
             
             
              
            ]);

   
          
                $user->nom = $request->nom  ;
                $user->prenom = $request->prenom  ;
                $user->poste = $request->poste  ;
                $user->experience = $request->experience  ;
                $user->date_naissance = $request->date_naissance  ;
                $user->pays = $request->pays  ;
                $user->ville = $request->ville ;
                $user->description = $request->description ;
                $user->facebook = $request->facebook ;
                $user->twitter = $request->twitter ;
                $user->instagram = $request->instagram ;
                $user->linkedin = $request->linkedin ;
                $user->contact1 = $request->contact1 ;
                $user->contact2 = $request->contact2 ;
                $user->profile_complete = true ;

          
                $user->update();


        }elseif($user->role == "recruteur"){

            $request->validate([

                'nom_entreprise' => 'required|string|max:255',
                'date_creation_entreprise' => 'date|max:255',
                'nb_salarie' => 'required|integer',
                'catégorie' => 'required|string',
                // 'date_naissance' => 'required|date|max:255',
                'pays' => 'required|string|max:255',
                'ville' => 'string|max:255',
                
              
            ]);

                         
                $user->nom = $request->nom_entreprise  ;
                $user->date_creation_entreprise = $request->date_creation_entreprise  ;
                $user->nb_salarie = $request->nb_salarie  ;
                $user->categorie = $request->catégorie  ;
                // 'date_naissance' => $request->date_naissance  ,
                $user->pays = $request->pays  ;
                $user->ville = $request->ville ;
                $user->description = $request->description ;
                $user->facebook = $request->facebook ;
                $user->twitter = $request->twitter ;
                $user->instagram = $request->instagram ;
                $user->linkedin = $request->linkedin ;
                $user->contact1 = $request->contact1 ;
                $user->contact2 = $request->contact2 ;

                $user->profile_complete = true ;
          
                $user->update();

        }
       


        
        return redirect()->route('dashboard')->with('ok', __("Votre profile a été mis à jour ")  );


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
