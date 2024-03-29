<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;

    protected $guarded =[];
    protected $dates = ['date_expiration'];


    public function  user(){
        return $this->belongsTo(User::class);
    }

    
    public function  categorieoffre(){
        return $this->belongsTo(Categorieoffre::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'offre_users')->withPivot('cv', 'lettre_motivation','created_at');
    }

    // retourne Toutes les candidatures
    public static function candidatures($date_deb = null, $date_fin = null){

        $candidatures = OffreUser::all();        
        return $candidatures;
        
    }
}
