<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autorisation extends Model 
{

    protected $table = 'autorisations';
    public $timestamps = false;
    protected $fillable = array('ok','typeAuto_id','adherent_id');

    public function typeAutorisation()
    {
        return $this->belongsTo('App\TypeAutorisation', 'typeAuto_Id');
    }

    public function adherent()
    {
        return $this->belongsTo('App\Adherent', 'adherent_id');
    }

}
