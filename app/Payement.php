<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payement extends Model 
{

    protected $table = 'payements';
    public $timestamps = false;
    protected $fillable = array('montant', 'encaisseMois', 'numCheque');

    public function moyenPayement()
    {
        return $this->belongsTo('App\MoyenPayement', 'moyenPayement_id');
    }

    public function adherent()
    {
        return $this->belongsTo('App\Adherent', 'adherent_id');
    }

}