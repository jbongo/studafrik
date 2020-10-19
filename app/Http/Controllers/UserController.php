<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        dd($request);

        if(Auth::user()->role == "candidat"){

            // 'photo' => 'mimes:jpeg,bmp,png'

            $request->validate([

                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'poste' => 'required|string|max:255',
                'experience' => 'required|string|max:255',
                'date_naissance' => 'required|date|max:255',
                'pays' => 'required|string|max:255',
                'ville' => 'string|max:255',
                'description' => 'string',
                'facebook' => 'string|max:255',
                'twitter' => 'string|max:255',
                'instagram' => 'string|max:255',
                'linkedin' => 'string|max:255',
                'contact1' => 'string|max:255',
                'contact2' => 'string|max:255',
              
            ]);
    
        }elseif(Auth::user()->role == "recruteur"){

            $request->validate([

                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'poste' => 'required|string|max:255',
                'experience' => 'required|string|max:255',
                'date_naissance' => 'required|date|max:255',
                'pays' => 'required|string|max:255',
                'ville' => 'string|max:255',
                'description' => 'string',
                'facebook' => 'string|max:255',
                'twitter' => 'string|max:255',
                'instagram' => 'string|max:255',
                'linkedin' => 'string|max:255',
                'contact1' => 'string|max:255',
                'contact2' => 'string|max:255',
              
            ]);
        }
       

        $user = 


        dd($request);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
