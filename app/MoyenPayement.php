<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoyenPayement extends Model 
{

    protected $table = 'moyensPayements';
    public $timestamps = false;
    protected $fillable = array('type');

    public function payements()
    {
        return $this->hasMany('App\Payement');
    }

}