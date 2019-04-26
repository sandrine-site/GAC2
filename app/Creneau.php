<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Creneau extends Model 
{

    protected $table = 'creneaux';
    public $timestamps = false;
    protected $fillable = array('heure_debut', 'min_debut','jour_id','lieu_id','duree');

    public function lieu()
    {
        return $this->belongsTo('App\Lieu', 'lieux_id');
    }

    public function jour()
    {
        return $this->belongsTo('App\Jour', 'jour_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User','creneau_user', 'creneau_id','user_id');
    }

    public function adherents()
    {
        return $this->belongsToMany('App\Adherent','adherent_creneaux','creneau_id','adherent_id');
    }

}
