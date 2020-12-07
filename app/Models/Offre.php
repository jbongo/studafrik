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

    public function  categorie(){
        return $this->belongsTo(CategorieOffre::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'offre_users');
    }
}
