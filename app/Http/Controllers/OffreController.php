<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Offre;
use App\Models\Candidature;
use App\Models\OffreUser;
use App\Models\Favorisoffre;
use App\Models\Pays;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Crypt;

use Illuminate\Support\Facades\File ;
use Illuminate\Support\Facades\Storage;

use App\Mail\CandidatureNotif;
use Illuminate\Support\Facades\Mail;


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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function offres_emplois()
    {
        
        $offres = Offre::where('active', true)->get();
        $nb_offres = sizeof($offres) ;

        return view('offre.offres_emplois', compact('offres','nb_offres'));
    }


    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function recherche_emplois(Request $request)
    {
    //  dd($request->categories);

        $poste = $request->poste;
        $pays = $request->pays;
        
        if($request->poste != null && $request->pays != null){
            $offres = Offre::where([['pays', $pays], ['active', true]])->where(function($query) use ($poste){
                $query->where('titre', 'like', '%'.$poste.'%')
                      ->orWhere('description', 'like', '%'.$poste.'%');
            })->get();

            // dd(111);
        }elseif($request->poste != null && $request->pays == null){
            $offres = Offre::where([ ['active', true]])->where(function($query) use ($poste){
                $query->where('titre', 'like', '%'.$poste.'%')
                      ->orWhere('description', 'like', '%'.$poste.'%');
            })->get();
            // dd(222);


        }elseif($request->poste == null && $request->pays != null){
            $offres = Offre::where([ ['pays', $pays], ['active', true] ])->get();
            // dd(333);

        }
        elseif($request->poste == null && $request->pays == null){
            $offres = Offre::where([ ['active', true] ])->get();
            // dd(444);

        }

        if($request->categorie != ""){
            
            $offres = $offres->where('categorie', $request->categorie );
        }


       $nb_offres = sizeof($offres) ;

        return view('offre.offres_emplois', compact('offres', 'nb_offres'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $pays = Pays::all();
        return view('offre.add', compact('pays'));
        
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

        $est_candidat = false;    
        $deja_postuler = false;
        $favoris = null;

        if(Auth::check() && Auth::user()->role == "candidat"){

            $offres = Auth::user()->offres;
            foreach ($offres as $off) {
            
                if($off->id == $offre->id){
                    $deja_postuler = true;
                }
            } 
            $est_candidat = true;

            $favoris = Favorisoffre::where([['offre_id', Crypt::decrypt($id)], ['user_id', Auth::user()->id]])->first();

        }

        $est_favoris = $favoris != null ? true : false ;

        

        return view('offre.show', compact('offre','deja_postuler','est_candidat','est_favoris'));
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


    

        /**
     * Display the specified resource.
     *
     * @param  int  $offre_id
     * @return \Illuminate\Http\Response
     */
    public function create_postuler($offre_id)
    {
    
        $offre = Offre::where('id', Crypt::decrypt($offre_id))->first();

        return view('candidature.postuler', compact('offre'));
    }

    
        /**
     * Display the specified resource.
     *
     * @param  int  $offre_id
     * @return \Illuminate\Http\Response
     */
    public function store_postuler( Request $request, $offre_id)
    {
    
    
        $offre = Offre::where('id', $offre_id)->first();

      


        // if($request->hasFile('cv_fichier')){

            $request->validate([
                'cv_fichier' => 'mimes:pdf,doc,docx',
            ]);

            $filename = 'cv-'.$offre_id.'-'.Auth::user()->id.'.pdf';
           
            // return response()->download(storage_path('app/pdf_compromis/pdf_compro.pdf'));
            $request->cv_fichier->storeAs('public/cv',$filename);
        // }

            $user = Auth::user();
            
        // dd($user);

            $user->offres()->attach([$offre_id], [                
                "cv" => $filename,
                "lettre_motivation" => $request->lettre_motivation,
                "created_at"=> date('Y-m-d'),
                "updated_at"=> date('Y-m-d'),
                ]);

        // OffreUser::create([
        //     "user_id" => Auth::user()->id,
        //     "offre_id" => $offre_id,
        //     "cv" => $filename,
        //     "lettre_motivation" => $request->lettre_motivation,
        // ]);

        Mail::to($offre->user->email)->send(new CandidatureNotif($offre));
        // return Redirect::back()->withErrors(['ok', 'Votre  candidature a été envoyé au recruteur ']);
        return view('offre.show', compact('offre'))->with('ok', 'Votre  candidature a été envoyé au recruteur ');;
    }








############################################### ADMIN ##################################################


 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_admin()
    {
        $offres = Offre::all();

        return view('admin.offre.index', compact('offres'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_admin()
    {

        $pays = Pays::all();
        return view('admin.offre.add', compact('pays'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_admin(Request $request)
    {
        

    //    dd($request->all());

        Offre::create([

            "user_id" => Auth::user()->id,
            "categorieoffre_id" => $request->categorie_offre_id,
            "nom_entreprise" => $request->nom_entreprise,
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
            "message_candidature" => $request->message_candidature,

        ]);


        return redirect()->route('admin.offres.index')->with('ok', __("Nouvelle offre ajoutée")  );

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_admin($id)
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
    public function edit_admin($id)
    {
        $offre = Offre::where('id', Crypt::decrypt($id))->first();
        $pays = Pays::all();
        return view('admin.offre.edit', compact('offre','pays'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_admin(Request $request, $id)
    {
      
        $offre = Offre::where('id', Crypt::decrypt($id))->first();


    
        $offre->categorie_offre_id = $request->categorie_offre_id ;
        $offre->nom_entreprise = $request->nom_entreprise ;
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
        $offre->message_candidature = $request->message_candidature ;


        $offre->update();
        return redirect()->route('mes_offres.index')->with('ok', __("Votre offre a été mise à jour ")  );



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_admin($id)
    {
        //
        $offre = Offre::where('id', Crypt::decrypt($id))->first();

      return   $offre->delete();
        
    }





    
}
