<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adherent extends Model
{
    protected $table = 'adherents';
    public $timestamps = false;
    protected $fillable = array('nom', 'prenom', 'lieuNaissance', 'dateNaissance', 'sexe', 'adresse', 'ville', 'cp', 'email1', 'nomUrgence', 'heureSemaine','groupe_id','section_id');


    public function tarif()
    {
        return $this->belongsTo('App\Tarif', 'tarif_id');
    }

    public function groupe()
    {
        return $this->belongsTo('App\Groupe', 'groupe_id');
    }

    public function telephones()
    {
        return $this->hasMany('App\Telephone');
    }

    public function remarques()
    {
        return $this->hasMany('App\Remarque');
    }

    public function autorisations()
    {
        return $this->hasMany('App\Autorisation');
    }

    public function Licence()
    {
        return $this->hasOne('App\Licence', 'adherent_id');
    }

    public function dossier()
    {
        return $this->hasOne('App\Dossier', 'adherent_id');
    }

    public function creneaux()
    {
        return $this->belongsToMany(Creneau::class);
    }

    public function section()
    {
        return $this->belongsTo('App\Section', 'section_id');
    }

    public function payements()
    {
        return $this->hasMany('App\Payement');
    }

}
