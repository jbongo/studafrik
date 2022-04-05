<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    use HasFactory;
    protected $guarded =[];

    public static function createHistorique($user_id,$ressource_id,$ressource,$action ){
        
        Historique::create([
            "user_id"=> $user_id,
            "ressource_id"=> $ressource_id,
            "ressource"=> $ressource,
            "action"=> $action,
        ]);
    }

    public function  user(){
        return $this->belongsTo(User::class);
    }
}
