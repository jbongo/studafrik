<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Scrapoffre;

class ScrapoffreController extends Controller
{
    //Liste des offres scrappées

    public function index(){

        $offres = Scrapoffre::where('statut', 0)->latest()->get();


        return view('admin.scrap_offre.index', compact('offres'));

    }

    //Affiche une offre scrappée

    public function show($id){

        $offre = Scrapoffre::where('id', $id)->first();


        return view('admin.scrap_offre.show', compact('offre'));

    }

    //Supprime une offre scrappée

    public function delete($id){

        $offre = Scrapoffre::where('id', $id)->first();

        Scrapoffre::destroy($id);

        return redirect()->route('admin.scrap_offre.index')->with('ok', "Offre $offre->titre supprimée");

    }
    
}
