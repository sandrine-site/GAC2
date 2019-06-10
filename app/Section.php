<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

    protected $table = 'sections';
    public $timestamps = false;
    protected $fillable = array('nom');

    public function adherents()
    {
        return $this->hasMany('App\Adherent');
    }
    public function groupes()
    {
        return $this->hasMany ('App\Groupe');
    }
  public function tarifs()
      {
        return $this->hasMany ('App\Tarif');
      }
}
