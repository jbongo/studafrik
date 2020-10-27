<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidature;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CandidatureController extends Controller
{
    


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $candidatures = Candidature::where('user_id', Auth::user()->id)->get();

        $user = User::where('id', Auth::user()->id )->first();

        $offres = $user->offres()->get();

        return view('candidature.mes_candidatures', compact('offres'));
    }
}
