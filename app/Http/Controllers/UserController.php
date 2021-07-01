<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
// use Image;
use App\Models\User;
use App\Models\Categorieoffre;
use App\Models\Favoriscv;
use App\Models\Offre;
use App\Models\Pays;
use App\Mail\BienvenueRecruteur;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Crypt;


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
    //    dd($request->all());


    $user = User::where('id', Auth::user()->id)->first();

    // Sauvegarde de la photo de profil
        if($request->photo_profil != null){
            $request->validate([
                "photo_profil" => "required|image|max:5000",
            ]);
            // dd($request);
        
            $user = User::where('id',Auth()->id())->first();
           
            if($request->hasFile('photo_profil')){
                $avatar = $request->file('photo_profil');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                $filename = $user->id.'_'.$filename;
                $avatar->move(public_path().'/images/photo_profil/',$filename);

                // Image::make($avatar)->save( public_path('\images\photo_profil\\' . $filename ) );
                
                
                // on supprime l'ancienne photo si elle existe
                if($user->photo_profile) {
                    // dd('xx');
                    
                    $img = public_path('images/photo_profil/'.$user->photo_profile);
                  
                    if(File::exists($img) ){
                       File::delete($img);
                   }
                   
                }

        
                $user->photo_profile = $filename;
                $user->update();
            }
        }

        // dd($request->all());



        // Sauvegarde de la photo de couverture
        if($request->photo_couverture != null){
            $request->validate([
                "photo_couverture" => "required|image|max:5000",
            ]);
        
            $user = User::where('id',Auth()->id())->first();
           
            if($request->hasFile('photo_couverture')){
                $avatar = $request->file('photo_couverture');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                $filename = $user->id.'_'.$filename;

                $avatar->move(public_path().'/images/photo_couverture/',$filename);
                // Image::make($avatar)->save( public_path('\images\photo_couverture\\' . $filename ) );
                
                
                // on supprime l'ancienne photo si elle existe
                if($user->photo_couverture) {
                    
                    $img = public_path('images/photo_couverture/'.$user->photo_couverture);
                  
                    if(File::exists($img) ){
                       File::delete($img);
                   }
                   
                }
        
                $user->photo_couverture = $filename;
                $user->update();
            }
        }

// Sauvegarde du cv

// $request->validate([
//     'pdf_compromis' => 'file:pdf'
// ]);

if($request->hasFile('cv')){

    $request->validate([
        'cv' => 'mimes:pdf,doc,docx',
    ]);

    $avatar = $request->file('cv');
    $filename =time() . '.' . $avatar->getClientOriginalExtension() ;
     $filename = $user->id."_".$filename;
    $user->cv = $filename;
    // return response()->download(storage_path('app/pdf_compromis/pdf_compro.pdf'));
    $request->cv->storeAs('public/cv/',$filename);
}

// ***********

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
                $user->pays_recherche = $request->pays_recherche  ;
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
                // 'date_creation_entreprise' => 'date|max:255',
                // 'nb_salarie' => 'required|integer',
                // 'catégorie' => 'required|string',
                // 'date_naissance' => 'required|date|max:255',
                'pays' => 'required|string|max:255',
                // 'ville' => 'string|max:255',
                
              
            ]);

                         
                $user->nom = $request->nom_entreprise  ;
                // $user->date_creation_entreprise = $request->date_creation_entreprise  ;
                $user->nb_salarie = $request->nb_salarie  ;
                $user->categorie = $request->categorie  ;
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
                $user->email_contact = $request->email_contact ;

                if($user->profile_complete == false){
                    Mail::to($user->email)->send(new BienvenueRecruteur());
                    $user->profile_complete = true ;

                }
          
                $user->update();



        }
       


        
        return redirect()->route('dashboard')->with('ok', __("Votre profil a été mis à jour ")  );


    }


    
     /**
     *Télécharger le fichier du cv.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function telecharger_cv($id)
    {
        
        $user = User::where('id',$id)->first();
        return response()->download(storage_path('app/public/cv/'.$user->cv));

    } 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_profil($user_id)
    {
        $candidat = User::where([['role','candidat'],['id',Crypt::decrypt($user_id)]])->first();
        
        $est_recruteur = false;
        if(Auth::check() && Auth::user()->role == "recruteur"){
            $favoris = Favoriscv::where([['candidat_id', Crypt::decrypt($user_id)], ['recruteur_id', Auth::user()->id]])->first();
            $est_recruteur = true;
        }
        // $favoris = Favoriscv::where([['candidat_id', Crypt::decrypt($user_id)], ['recruteur_id', Auth::user()->id]])->first();
   

        $est_favoris = $favoris != null ? true : false ;

        return view('candidat.show_profil', compact('candidat','est_favoris', 'est_recruteur'));
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



/** 
 * Modifier la photo de profile
 * 
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
*/
public function photoProfile(Request $request){

// return 444;
//     dd("dedede");

    $request->validate([
        "photo_profil" => "required|image|max:5000",
    ]);

    $user = User::where('id',Auth()->id())->first();
   
           
    if($request->hasFile('photo_profil')){
        $avatar = $request->file('photo_profil');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        $filename = $user->id.'_'.$filename;
        $avatar->move(public_path().'/images/photo_profil/',$filename);

        // Image::make($avatar)->save( public_path('\images\photo_profil\\' . $filename ) );
        
        
        // on supprime l'ancienne photo si elle existe
        if($user->photo_profile) {
            // dd('xx');
            
            $img = public_path('images/photo_profil/'.$user->photo_profile);
          
            if(File::exists($img) ){
               File::delete($img);
           }
           
        }

        $user->photo_profile = $filename;
        $user->update();
    }


    return back()->with('ok', __("La photo a bien été enregistrée"));
}


    
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profilRecruteur()
    {
    
       $user = Auth::user();
       $categories = Categorieoffre::all();

        return view('recruteur.profil', compact('user','categories'));
    }



    /**
     * Afficher la liste des recruteurs
     *
     * @return \Illuminate\Http\Response
     */
    public function bibliothequeRecruteur(Request $request)
    {
    
        $raison_sociale = $request->raison_sociale;
        $pays = $request->pays;
        $categorie = $request->categorie;

       $recruteurs = User::where([ ['role', 'recruteur'], ['profile_complete', 1],  ])
       
       // trie avec la raison sociale
       ->where(function($query) use ($raison_sociale){
            if($raison_sociale != null){
                $query->where('raison_sociale', 'like', '%'.$raison_sociale.'%');
            
            }
        
        })
        // trie avec le pays
       ->where(function($query) use ($pays){
            if($pays != null){
                $query->where('pays', 'like', '%'.$pays.'%');
            }
        
        })

         // trie avec la catégorie
       ->where(function($query) use ($categorie){
        if($categorie != null){
            $query->where('categorie', 'like', '%'.$categorie.'%');
        }
    
    })

    ->whereNotIn('id',[8,7])
       
       
       ->paginate(10)->withQueryString();

    //    dd($categorie);
      
       $payss = Pays::all();
       $categories = Categorieoffre::all();

       $cat = Categorieoffre::where('id',$categorie)->first();
       $cat = $cat!= null ? $cat->nom : null;

        return view('recruteur.biblio.index', compact('recruteurs','raison_sociale', 'pays','payss','categories','cat'));
    }


    
    /**
     * Afficher le profile d'un recruteurs
     *
     * @return \Illuminate\Http\Response
     */
    public function showBibliothequeRecruteur($recruteur_id)
    {
    
        $recruteur = User::where('id', Crypt::decrypt($recruteur_id) )->first();
        $offres = Offre::where('user_id', Crypt::decrypt($recruteur_id))->paginate(10)->withQueryString();



        return view('recruteur.biblio.show', compact('recruteur','offres'));
    }





    ###################################### ADMIN ######################################


   /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_login()
    {

        return view('admin.login');
    }

     /**
     * Affiche la liste des candidats
     *
     * @return \Illuminate\Http\Response
     */
    public function index_candidat()
    {

        $candidats = User::where('role','candidat')->get();
        return view('admin.candidat.index', compact('candidats'));
    }

    /**
     * Page de modification d'un candidat
     *
     * @return \Illuminate\Http\Response
     */
    public function edit_candidat($candidat_id)
    {

        return view('admin.login');
    }

    /**
     *  modification d'un candidat
     *
     * @return \Illuminate\Http\Response
     */
    public function update_candidat($candidat_id)
    {

        return view('admin.login');
    }

    
    /**
     *  suppression d'un candidat
     *
     * @return \Illuminate\Http\Response
     */
    public function delete_candidat($candidat_id)
    {

        return view('admin.login');
    }

    
     /**
     * Affiche la liste des recruteurs
     *
     * @return \Illuminate\Http\Response
     */
    public function index_recruteur()
    {

        $recruteurs = User::where('role','recruteur')->get();
        return view('admin.recruteur.index', compact('recruteurs'));
    }

    /**
     * Page de modification d'un recruteur
     *
     * @return \Illuminate\Http\Response
     */
    public function edit_recruteur($recruteur_id)
    {

        return view('admin.login');
    }

    /**
     *  modification d'un recruteur
     *
     * @return \Illuminate\Http\Response
     */
    public function update_recruteur($recruteur_id)
    {

        return view('admin.login');
    }

    
    /**
     *  suppression d'un recruteur
     *
     * @return \Illuminate\Http\Response
     */
    public function delete_recruteur($recruteur_id)
    {

        return view('admin.login');
    }

}
