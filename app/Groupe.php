<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{

  protected $table = 'groupes';
  public $timestamps = false;
  protected $fillable = array('nom', 'categorie','section_id');
  protected $nullable = array ('categorie');

  public function users()
  {
    return $this->belongsToMany('App\User', 'groupe_user','groupe_id','user_id');
  }

  public function adherents()
  {
    return $this->hasMany('App\Adherent');
  }
  public function section()
  {
    return $this->belongsTo ('App\Section');
  }

}
