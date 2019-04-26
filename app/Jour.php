<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jour extends Model 
{

    protected $table = 'jours';
    public $timestamps = false;
    protected $fillable = array('jour');

    public function creneaux()
    {
        return $this->hasMany('App\Creneau', 'jour_id');
    }

}