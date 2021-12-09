<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competence;
use Illuminate\Support\Facades\Crypt;

class CompetenceController extends Controller
{
    /**
     * Liste des compétences
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competences = Competence::all();

        return view('admin.configuration.competence.index',compact('competences'));
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
            
            'nom' => 'required|string|unique:competences',
          
        ]);

        Competence::create([
            "nom"=>$request->nom
        ]);

        return redirect()->route('admin.competence.index')->with('ok', __("Nouvelle compétence ajoutée")  );
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
     *Modification d'une compétence
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $competence_id)
    {
        $competence = Competence::where('id',Crypt::decrypt($competence_id))->first();

        if($competence->nom != $request->nom){
            $request->validate([
            
                'nom' => 'required|string|unique:competences',
              
            ]);
        }

        $competence->nom = $request->nom ;

        $competence->update();

        return redirect()->route('admin.competence.index')->with('ok', "compétence modifiée");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($competence_id)
    {
        
        Competence::destroy(Crypt::decrypt($competence_id));

        return redirect()->route('admin.competence.index')->with('ok','compétence supprimée');
    }
}
