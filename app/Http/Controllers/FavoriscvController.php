<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favoriscv;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
class FavoriscvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $candidats_id = array();
        $candidats_ids = Favoriscv::where('recruteur_id', Auth::user()->id )->select('candidat_id')->get()->toArray();

        foreach ($candidats_ids as $id) {
            $candidats_id[] = $id;
        }

        $candidats = User::whereIn('id', $candidats_id)->get();
    

        return view('recruteur.cv_sauvegarde', compact('candidats'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($recruteur_id,$candidat_id)
    {
        Favoriscv::create([
            "candidat_id"=>$candidat_id,
            "recruteur_id"=>$recruteur_id,
        ]);
       
        return redirect()->route("user.show_profil", Crypt::encrypt($candidat_id))->with('ok','Profil sauvegardé dans vos favoris');
    }
    


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($recruteur_id,$candidat_id)
    {
        $favoris = Favoriscv::where([['recruteur_id', $recruteur_id], ['candidat_id', $candidat_id]])->first();

        // dd($favoris);
        if ($favoris != null )
        $favoris->delete();
        return redirect()->route("favoris.cv.index")->with('ok','CV supprimé des favoris');

        
    }
}
