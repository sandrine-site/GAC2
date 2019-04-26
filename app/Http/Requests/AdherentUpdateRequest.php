<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationData;
use Illuminate\Validation\Validator;

class AdherentUpdateRequest extends FormRequest
{
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


        return
        [
            'adresse'=>'nullable|max:200',
            'ville'=>'nullable|string|max:50',
            'cp'=>'nullable|integer',
            'email1'=>'nullable|email|max:255',
            'email2'=>'nullable|email|max:255',
            'section_id'=>'nullable|integer',
            'nom_Urgence'=>'nullable|string|max:50',
            'telephone_Urgence'=>'nullable|regex:#^0[1-9]([-. /]?[0-9]{2}){4}$#',
            'nbHeures'=>'nullable',

    ];}}

