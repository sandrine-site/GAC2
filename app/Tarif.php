<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model 
{

    protected $table = 'tarifs';
    public $timestamps = false;
    protected $fillable = array('libele', 'prix', 'anneeMini', 'anneeMaxi');

    public function adherents()
    {
        return $this->hasMany('App\Adherent');
    }

}