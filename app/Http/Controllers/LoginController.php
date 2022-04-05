<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Historique;

class LoginController extends Controller
{
    /**
     * Connexion au BO admin
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
     public function authenticate(Request $request)
     {
         
         $credentials = $request->only('email', 'password');
 
         if (Auth::attempt($credentials)) {
             // Authentication passed...
       
             Historique::createHistorique(Auth::user()->id, Auth::user()->id,"connexion","s'est connecté" );
             return redirect()->intended('admin/dashboard');
         }

         return back()->withErrors([
            'password' => ['Login ou Mot de passe incorrect']
        ]);

       
    //    Dans illuminate\Auth\Middelware\Authenticate
  /** 
  
* use \App\Models\Historique;
*use Illuminate\Support\Facades\Auth as Authen;
 
* Historique::createHistorique(Authen::user()->id, Authen::user()->id,"connexion","s'est connecté" );
 */
     }
}
