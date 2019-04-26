<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lieu extends Model 
{

    protected $table = 'lieux';
    public $timestamps = false;
    protected $fillable = array('nom');

    public function creneaux()
    {
        return $this->hasMany('App\Creneau');
    }

}