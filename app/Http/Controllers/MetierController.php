<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Metier;
use Illuminate\Support\Facades\Crypt;

class MetierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metiers = Metier::all();


        return view('admin.configuration.metier.index',compact('metiers'));

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

        $request->validate([
            
            'nom' => 'required|string|unique:metiers',
          
        ]);

        Metier::create([
            "nom"=>$request->nom
        ]);

        // return redirect::back()->with('_ok', "");
        return redirect()->route('admin.metier.index')->with('ok', __("Nouveau metier ajouté")  );

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
    public function update(Request $request, $metier)
    {
        $metier = Metier::where('id',Crypt::decrypt($metier))->first();

        if($metier->nom != $request->nom){
            $request->validate([
            
                'nom' => 'required|string|unique:metiers',
              
            ]);
        }

        $metier->nom = $request->nom ;

        $metier->update();

        return redirect()->route('admin.metier.index')->with('ok', "Nom du metier modifié");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($metier)
    {


        Metier::destroy(Crypt::decrypt($metier));

        return redirect()->route('admin.metier.index')->with('ok','métier supprimé');
    }
}
