<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remarque extends Model 
{

    protected $table = 'remarques';
    public $timestamps = false;
    protected $fillable = array('remarque','typeRq_id','adherent_id');

    public function typeRq()
    {
        return $this->belongsTo('App\TypeRq', 'typeRq_id');
    }

    public function adherent()
    {
        return $this->belongsTo('App\Adherent', 'adherent_id');
    }

}
