<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidature;
use App\Models\User;
use App\Models\Offre;
use Illuminate\Support\Facades\Auth;

class CandidatureController extends Controller
{
    


    /**
     * Liste des candidatures d'un candidat  #Profil candidat
     *
     * @return \Illuminate\Http\Response
     */
    public function index_candidat()
    {
        // $candidatures = Candidature::where('user_id', Auth::user()->id)->get();

        $user = User::where('id', Auth::user()->id )->first();

        $offres = $user->offres;

    //    dd($offres);

        return view('candidat.candidatures.index', compact('offres'));
    }


    /**
     * Liste des candidatures d'une offre  #Profil recruteur
     *
     * @return \Illuminate\Http\Response
     */
    public function index_recruteur($offre_slug)
    {
        // $candidatures = Candidature::where('user_id', Auth::user()->id)->get();

        $offre = Offre::where('slug', $offre_slug )->first();

        $candidatures = $offre->users;

    //    dd($offres);

        return view('recruteur.candidatures.index', compact('offre','candidatures'));
    }



}
