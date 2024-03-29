<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function  commentaires(){
        
        // return 
        $commentaires = $this->hasMany(Commentaire::class);
        return $commentaires->where('valide',1)->get();
    }

    public function  categoriearticle(){

        $categorie = Categoriearticle::where('id', $this->categoriearticle_id)->first();


        return $categorie;


        // return $this->belongsTo(Categoriearticle::class);
    }

}
