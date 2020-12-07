<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv_experience extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $dates = ['date_deb','date_fin'];

}
