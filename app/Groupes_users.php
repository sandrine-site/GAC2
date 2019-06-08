<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupes_users extends Model
{

    protected $table = 'groupe_user';
    public $timestamps = false;
  protected $fillable = array('groupe_id','user_id');
}
