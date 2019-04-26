<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeRq extends Model 
{

    protected $table = 'typesRqs';
    public $timestamps = false;
    protected $fillable = array('type');

    public function remarques()
    {
        return $this->hasMany('Remarque');
    }

}