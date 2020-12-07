<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use Image;
use App\Models\User;
use App\Models\Categorie;

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
       

        // dd($request);

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
                $avatar->move(public_path().'\images\photo_profil\\',$user->id.'.jpg');

                // Image::make($avatar)->save( public_path('\images\photo_profil\\' . $filename ) );
                
                
                // on supprime l'ancienne photo si elle existe
                if($user->photo_profile) {
                    
                    $img = public_path('images/photo_profil/'.$user->photo_profile);
                  
                    if(File::exists($img) ){
                       File::delete($img);
                   }
                   
                }
        
                $user->profile_photo_path = $filename;
                $user->update();
            }
        }



        if($request->photo_couverture != null){
            $request->validate([
                "photo_couverture" => "required|image|max:5000",
            ]);
            // dd($request);
        
            $user = User::where('id',Auth()->id())->first();
           
            if($request->hasFile('photo_couverture')){
                $avatar = $request->file('photo_couverture');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                $filename = $user->id.'_'.$filename;$

                $avatar->move(public_path().'\images\\',$user->id.'.jpg');
                // Image::make($avatar)->save( public_path('\images\photo_couverture\\' . $filename ) );
                
                
                // on supprime l'ancienne photo si elle existe
                if($user->photo_couverture) {
                    
                    $img = public_path('images/photo_couverture/'.$user->photo_couverture);
                  
                    if(File::exists($img) ){
                       File::delete($img);
                   }
                   
                }
        
                $user->photo_couverture_path = $filename;
                $user->update();
            }
        }


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
                // 'catégorie' => 'required|string',
                // 'date_naissance' => 'required|date|max:255',
                'pays' => 'required|string|max:255',
                // 'ville' => 'string|max:255',
                
              
            ]);

                         
                $user->nom = $request->nom_entreprise  ;
                $user->date_creation_entreprise = $request->date_creation_entreprise  ;
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



/** 
 * Modifier la photo de profile
 * 
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
*/
public function photoProfile(){

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
        Image::make($avatar)->save( public_path('\images\photo_profil\\' . $filename ) );
        
        
        // on supprime l'ancienne photo si elle existe
        if($user->photo_profile) {
            
            $img = public_path('images/photo_profil/'.$user->photo_profile);
          
            if(File::exists($img) ){
               File::delete($img);
           }
           
        }

        $user->photo_profile_path = $filename;
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
       $categories = Categorie::all();

        return view('recruteur.profil', compact('user','categories'));
    }




    //################### ADMIN


   /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_login()
    {

        return view('admin.login');
    }
}
