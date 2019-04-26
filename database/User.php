<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model 
{

    protected $table = 'users';
    public $timestamps = false;
    protected $fillable = array('name', 'prenom', 'email', 'telephone', 'password');
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
        return $this->belongsTo('App\Fonction', 'id_fonction');
    }

    public function creneaux()
    {
        return $this->belongsToMany('App\Creneau', 'creneau_id')->whit Pivot(creneau_user);
    }

    public function groupe()
    {
        return $this->belongsToMany('App\Groupe', 'groupe_id')->whit Pivot(groupes_users);
    }

}