<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
use App\Models\Favorisoffre;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;


class FavorisoffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offres_id = array();
        $offres_ids = Favorisoffre::where('user_id', Auth::user()->id )->select('offre_id')->get()->toArray();

        foreach ($offres_ids as $id) {
            $offres_id[] = $id;
        }
        // dd($offres_id);

        $offres = Offre::whereIn('id', $offres_id)->get();
    

        return view('candidat.offres_sauvegarde', compact('offres'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($user_id, $offre_id)
    {
        Favorisoffre::create([
            "user_id"=>$user_id,
            "offre_id"=>$offre_id,
        ]);
        $offre = Offre::where('id', $offre_id)->first();
       
        return redirect()->route("mes_offres.show", $offre->slug)->with('ok','Offre sauvegardée dans vos favoris');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, $offre_id)
    {
        $favoris = Favorisoffre::where([['user_id', $user_id], ['offre_id', $offre_id]])->first();

        // dd($favoris);
        if ($favoris != null )
        $favoris->delete();
        return redirect()->route("favoris.offre.index")->with('ok','Offre supprimée des favoris');
    }
}
