<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    public $timestamps = false;
    protected $fillable = array('name', 'prenom', 'email', 'telephone', 'password','fonction_id');
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function fonction()
    {
        return $this->belongsTo('App\Fonction', 'fonction_id');
    }

    public function creneaux()
    {
        return $this->belongsToMany('App\Creneau', 'creneau_user','user_id','creneau_id');
    }

    public function groupes()
    {
        return $this->belongsToMany(Groupe::class);
    }

}
