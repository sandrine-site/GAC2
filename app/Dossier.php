<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model 
{

    protected $table = 'dossiers';
    public $timestamps = false;
    protected $fillable = array('certifMedical', 'photo', 'adherent_id','autorisationsRendues', 'payementOk', 'aidesSociales', 'recuDemande');

    public function adherent()
    {
        return $this->belongsTo('App\Adherent', 'adherent_id');
    }

}
