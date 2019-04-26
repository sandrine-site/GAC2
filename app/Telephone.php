<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telephone extends Model 
{

    protected $table = 'telephones';
    public $timestamps = false;
    protected $fillable = array('numero','adherent_id','typeTel_id');

    public function typeTel()
    {
        return $this->belongsTo('App\TypeTel', 'typeTel_id');
    }

    public function adherent()
    {
        return $this->belongsTo('App\Adherent', 'adherent_id');
    }

}
