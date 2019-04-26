<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeAutorisation extends Model 
{

    protected $table = 'typesAutorisations';
    public $timestamps = false;
    protected $fillable = array('type');

    public function autorisations()
    {
        return $this->hasMany('App\Autorisation');
    }

}