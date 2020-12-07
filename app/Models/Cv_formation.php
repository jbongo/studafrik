<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv_formation extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $dates = ['date_deb','date_fin'];

}
