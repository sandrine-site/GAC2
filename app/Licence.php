<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Licence extends Model
{

    protected $table = 'licences';
    public $timestamps = false;
    protected $fillable = array('numLicence', 'DateLicence');

    public function adherent()
    {
        return $this->belongsTo('App\Adherent');
    }

}