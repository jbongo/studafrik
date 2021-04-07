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
use App\Models\Categorieoffre;


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
        $offres = Offre::where('user_id', Auth::user()->id)->get();
        $offres_ids = Offre::select('id')->where('user_id', Auth::user()->id)->get()->toArray();
        $ids = array();
        foreach ($offres_ids as $offres_id ) {
            $ids[] = $offres_id['id']; 
        }
        // dd($ids);

        $nb_offres = sizeof($offres) ;
        $nb_offres_actives = Offre::where([['user_id', Auth::user()->id],['active',1]])->count();
        $nb_candidatures = OffreUser::wherein('offre_id', $ids)->count();
// dd($nb_candidatures);
        
        return view('offre.index', compact('offres','nb_offres','nb_offres_actives','nb_candidatures'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function offres_emplois()
    {
        
        $offres = Offre::orderBy('created_at','desc')->paginate(10);
        $nb_offres = sizeof($offres) ;
        // dd($offres);
        $payss = Pays::all();

        $categories = Categorieoffre::all();

        $typeoffres = null;
        $experiences = null;
        $categoris = null;
        $cat = null;
        $pays = null;
        $date_publication = null;

        $total = $offres->total();
        
        return view('offre.offres_emplois', compact('offres','nb_offres','categories','payss','pays','typeoffres','experiences','categoris','date_publication','cat','total'));
    }


    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function recherche_emplois(Request $request)
    {
    //  dd($request->all());


    
        $poste = $request->poste;
        $pays = $request->pays;
        $categorie = $request->categorie ;

        $typeoffres = $request->typeoffres;
        $experiences = $request->experiences;
        $categoris = $request->categories;

        $date_publication = $request->date_publication;
        
        $today = date('Y-m-d');
        $date_pub=  date('Y-m-d', strtotime($today. " - $date_publication days"));
// dd($date_publication);

            $offres = Offre::where([['active', true]])
            
            // trie avec le poste
            ->where(function($query) use ($poste){
                if($poste != null){
                    $query->where('titre', 'like', '%'.$poste.'%')
                    ->orWhere('description', 'like', '%'.$poste.'%');
                }
                
            })
            // trie avec la catégorie
            ->where(function($query2) use ($categorie){
                if($categorie != ""){
                    $query2->where('categorieoffre_id', $categorie);
                }
            })

            // Trie avec le pays
            ->where(function($query2) use ($pays){
                if($pays != ""){
                    $query2->where('pays', $pays);
                }
            })

              // Trie avec l'experience requise
              ->where(function($query2) use ($experiences){
                if($experiences != null){
                    $query2->whereIn('experience', $experiences);
                }
            })
            // Trie avec le type du contrat
            ->where(function($query2) use ($typeoffres){
                if($typeoffres != null){
                    $query2->whereIn('type_contrat', $typeoffres);
                }
            })

            // Trie avec les categories
            ->where(function($query2) use ($categoris){
                if($categoris != null){
                    $query2->whereIn('categorieoffre_id', $categoris);
                }
            })
            // Trie avec la date de publication
            ->where(function($query2) use ($date_pub){
                if($date_pub != null){
                    $query2->where('created_at','>', $date_pub);
                }
            })
            ->orderBy('created_at','desc')
            ->paginate(10);



       $nb_offres = sizeof($offres) ;
        $total = $offres->total();
      
       $payss = Pays::all();

       $categories = Categorieoffre::all();
       $cat = Categorieoffre::where('id',$categorie)->first();
       $cat = $cat!= null ? $cat->nom : null;
   


        return view('offre.offres_emplois', compact('offres', 'nb_offres','payss','pays','cat','categories','typeoffres','experiences','categoris','date_publication','total' ));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $pays = Pays::all();
        $categories = Categorieoffre::all();

        return view('offre.add', compact('pays','categories'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    
        $offre = Offre::create([

            "user_id" => Auth::user()->id,
            "categorieoffre_id" => $request->categorieoffre_id,
            "titre" => $request->titre,
            "description" => $request->description,
            "type_contrat" => $request->type_contrat,
            "description_profil" => $request->description_profil,
            "sexe" => $request->sexe,
            "devise_salaire" => $request->devise_salaire,
            "salaire" => $request->salaire,
            "experience" => $request->experience,
            "pays" => $request->pays,
            "ville" => $request->ville,
            "date_expiration" => $request->date_expiration,
            "candidater_lien" => $request->candidater_lien,
            "url_candidature" => $request->url_candidature,

        ]);


        $slug = $this->to_slug($request->titre);

        $slug = $slug."-".$offre->id;

        $offre->slug = $slug;
        $offre->update();

        // dd($offre);
        
        
        return redirect()->route('mes_offres.index')->with('ok', __("Nouvelle offre ajoutée")  );

    }



  /**
     * Convertir une chaine de caractère en slug.
     *
     * @param  String $slug
     * @return String 
     */
    public function convert_to_slug()
    {

       $offres =  Offre::all();

       foreach($offres as $offre){

            $slug = $this->to_slug($offre->titre);
            $slug = $slug."-".$offre->id;

            $offre->slug = $slug;
            $offre->update();

       }



    }


  /**
     * Convertir une chaine de caractère en slug.
     *
     * @param  String $slug
     * @return String 
     */
    public function to_slug($string)
    {

        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));

        return $slug;
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
        $categories = Categorieoffre::all();


        return view('offre.edit', compact('offre','categories'));
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


    
        $offre->categorieoffre_id = $request->categorieoffre_id ;
        $offre->titre = $request->titre ;
        $offre->description = $request->description ;
        $offre->type_contrat = $request->type_contrat ;
        $offre->description_profil = $request->description_profil ;
        $offre->sexe = $request->sexe ;
        $offre->salaire = $request->salaire ;
        $offre->devise_salaire = $request->devise_salaire ;
        $offre->experience = $request->experience ;
        // $offre->competence_requise = $request->competence_requise ;
        $offre->pays = $request->pays ;
        $offre->ville = $request->ville ;
        $offre->date_expiration = $request->date_expiration ;
        
        $offre->candidater_lien = $request->candidater_lien ;
        $offre->url_candidature = $request->url_candidature ;


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
        return redirect()->route('candidatures.index')->with('ok', __("Votre  candidature a été envoyé au recruteur")  );

        // return view('mes_offres.show', compact('offre'))->with('ok', 'Votre  candidature a été envoyé au recruteur ');;
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
        $categories = Categorieoffre::all();

        return view('admin.offre.add', compact('pays','categories'));
        
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

    $offre = Offre::create([

            "user_id" => Auth::user()->id,
            "categorieoffre_id" => $request->categorieoffre_id,
            "nom_entreprise" => $request->nom_entreprise,
            "titre" => $request->titre,
            "description" => $request->description,
            "type_contrat" => $request->type_contrat,
            "description_profil" => $request->description_profil,
            "sexe" => $request->sexe,
            "salaire" => $request->salaire,
            "devise_salaire" => $request->devise_salaire,
            "experience" => $request->experience,
            // "competence_requise" => $request->competence_requise,
            "pays" => $request->pays,
            "ville" => $request->ville,
            "date_expiration" => $request->date_expiration,
            "message_candidature" => $request->message_candidature,

            "candidater_lien" => $request->candidater_lien,
            "url_candidature" => $request->url_candidature,

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
        $categories = Categorieoffre::all();

        return view('admin.offre.edit', compact('offre','pays','categories'));
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


    
        $offre->categorieoffre_id = $request->categorieoffre_id ;
        $offre->nom_entreprise = $request->nom_entreprise ;
        $offre->titre = $request->titre ;
        $offre->description = $request->description ;
        $offre->type_contrat = $request->type_contrat ;
        $offre->description_profil = $request->description_profil ;
        $offre->sexe = $request->sexe ;
        $offre->salaire = $request->salaire ;
        $offre->devise_salaire = $request->devise_salaire ;
        $offre->experience = $request->experience ;
        $offre->pays = $request->pays ;
        $offre->ville = $request->ville ;
        $offre->date_expiration = $request->date_expiration ;
        $offre->message_candidature = $request->message_candidature ;

        $offre->candidater_lien = $request->candidater_lien ;
        $offre->url_candidature = $request->url_candidature ;


        $offre->update();
        return redirect()->route('admin.offres.index')->with('ok', __("Votre offre a été mise à jour ")  );



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
