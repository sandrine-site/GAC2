<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeTel extends Model 
{

    protected $table = 'typesTels';
    public $timestamps = false;
    protected $fillable = array('type');

    public function telephones()
    {
        return $this->hasMany('App\Telephone');
    }

}