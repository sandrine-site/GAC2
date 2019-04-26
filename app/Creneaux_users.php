<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Creneaux_users extends Model 
{

    protected $table = 'creneaux_users';
    public $timestamps = false;
    protected $fillable = array('crenaux_id','user_id');

}
