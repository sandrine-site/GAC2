<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Creneaux;
use App\User;
class Creneaux_adherents extends Model 
{

    protected $table = 'creneaux_adherents';
    public $timestamps = false;

    public function creneaux()
    {
        return $this->hasMany ('Creneaux'),
    }
    public function users()
    {
        return $this->hasMany ('Users');
    }

}
