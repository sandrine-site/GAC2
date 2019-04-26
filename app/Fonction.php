<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fonction extends Model 
{

    protected $table = 'fonctions';
    public $timestamps = false;
    protected $fillable = array('fonction');

    public function users()
    {
        return $this->hasMany('App\User');
    }

}