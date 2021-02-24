<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Commentaire;

use Illuminate\Support\Facades\Crypt;

 
class CommentaireController extends Controller
{
    /**
     * Liste de tous les commentaires / validés, non validé, et à valider
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commentaires = Commentaire::all();

        return view('admin.commentaire.index',compact('commentaires'));

    }

  
    /**
     * Liste des 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function valider($commentaire_id)
    {
        $commentaire = Commentaire::where('id', Crypt::decrypt($commentaire_id))->first();

        $commentaire->valide = true;

        $commentaire->update();
    }

   
    /**
     * Suppression d'un commentraire
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($commentaire_id)
    {
        $commentaire = Commentaire::where('id', Crypt::decrypt($commentaire_id))->first();

        $commentaire->delete();
    }
}