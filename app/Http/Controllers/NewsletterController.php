<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Mail\ValidationNewsletter;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;


class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $newsletters = Newsletter::where('valide', true)->get();
        return view('admin.newsletter.index', compact('newsletters'));
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
        //
        
        $request->validate([
            "email" => "required|email|unique:newsletters",
        ]);
      $newsletter =  Newsletter::create([
        "email"=> $request->email
        ]);
        
        Mail::to($newsletter->email)->send(new ValidationNewsletter( Crypt::encrypt($newsletter->id)));
        
        
        return redirect()->route('newsletter.message')->with('ok', "Un mail de validation vous a été envoyé à l'adresse {$newsletter->email} !");
    }

    /**
     * Page de validation de la newsletter
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function validation($id)
    {
        
        $newsletter = Newsletter::where('id', Crypt::decrypt($id))->first();
        
        if($newsletter != null ){
        
            if($newsletter->valide == false){
                
                $newsletter->valide = true ;
                $newsletter->update();
                
                return redirect()->route('newsletter.message')->with('ok', "Félicitation vous êtes enregistré dans notre newsletter");
                
            }else{
                return redirect()->route('newsletter.message')->with('ok', "Votre adresse email est déjà valide");
            }
        
        }else {
        
            return redirect()->route('newsletter.message')->with('ok', "Ce lien a expiré");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function message()
    {
        return view('newsletter.validation');

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
