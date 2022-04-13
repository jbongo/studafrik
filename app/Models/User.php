<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $dates = ['date_creation_entreprise'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded =[];

    // protected $fillable = [
    //     'role',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'photo_profile',
    ];

    // offres candidatées par le user
    public function offres()
    {
        return $this->belongsToMany(Offre::class,'offre_users')->withPivot('cv', 'lettre_motivation','created_at','updated_at');
    }

    // offres ajoutée par le recruteur
    public function  mes_offres(){
        return $this->hasMany(Offre::class);
    }



    // 
    public function  cv_formation(){
        return $this->hasMany(Cv_formation::class);
    }

    public function  cv_competence(){
        return $this->hasMany(Cv_competence::class);
    }

    public function  cv_experience(){
        return $this->hasMany(Cv_experience::class);
    }
}
