<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pays;
use Illuminate\Support\Facades\Crypt;


class PaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pays = Pays::all();


        return view('admin.configuration.pays.index',compact('pays'));

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
            
            'nom' => 'required|string|unique:pays',
          
        ]);

        Pays::create([
            "nom"=>$request->nom
        ]);

        // return redirect::back()->with('_ok', "");
        return redirect()->route('admin.pays.index')->with('ok', __("Nouveau Pays ajouté")  );

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
    public function update(Request $request, $pays)
    {
        $pays = Pays::where('id',Crypt::decrypt($pays))->first();

        if($pays->nom != $request->nom){
            $request->validate([
            
                'nom' => 'required|string|unique:pays',
              
            ]);
        }

        $pays->nom = $request->nom ;

        $pays->update();

        return redirect()->route('admin.pays.index')->with('ok', "Nom du Pays modifié");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($pays)
    {


        Pays::destroy(Crypt::decrypt($pays));

        return redirect()->route('admin.pays.index')->with('ok','pays supprimé');
    }
}
