<?php

namespace App\Http\Requests;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationData;
use Illuminate\Validation\Validator;

class AdherentUpdateGroupeRequest extends FormRequest

{

    protected $table = 'adherents';
    public $timestamps = false;
    protected $fillable = array('groupe_id');

    public function rules()
    {
        return
            [
                'groupe_id'=>'required|integer|200',

            ];}
    public function groupe()
    {
        return $this->belongsTo('App\Groupe', 'groupe_id');
    }
}
