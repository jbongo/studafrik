<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact as ContactMail;

class ContactController extends Controller
{
    
    
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            
            'nom' => 'required|string',
            'email' => 'required|string',
            'sujet' => 'required|string',
            'message' => 'required|string',
          
        ]);

    
        // dd($request->all());

        Contact::create([
            "nom"=>$request->nom,
            "email"=>$request->email,
            "sujet"=>$request->sujet,
            "message"=>$request->message
        ]);


        Mail::to($request->email)->send(new ContactMail($request->nom, $request->email, $request->sujet, $request->message));
        // return redirect::back()->with('_ok', "");
        return redirect()->route('nous_contacter')->with('ok', __("Votre message a été envoyé. ")  );

    }
}
