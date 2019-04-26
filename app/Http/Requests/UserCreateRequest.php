<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UserCreateRequest extends FormRequest
{   public $timestamps = false;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|string|max:20',
            'prenom'=>'nullable|max:20',
            'email'=>'required|email|max:255',
            'telephone'=>'nullable|regex:#^0[1-9]([-. /]?[0-9]{2}){4}$#',
            'fonction_id'=>'required',
            'password'=>'required|confirmed|min:6' ];
    }
}
