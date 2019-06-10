<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{

    protected $table = 'tarifs';
    public $timestamps = false;
    protected $fillable = array('libele', 'prix', 'anneeMini', 'anneeMaxi','section_id','temps');

    public function adherents()
    {
        return $this->hasMany('App\Adherent');
    }
  public function section()
      {
          return $this->belongsTo('App\Section', 'section_id');
      }

}
