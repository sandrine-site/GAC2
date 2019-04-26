<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreneauCreateRequest extends FormRequest
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
        return [
            'jour_id'=>'required|integer',
            'heure_debut'=>'required|integer',
            'min_debut'=>'nullable|string',
            'duree'=>'required|between:0,10',
            'lieu_id'=>'nullable|integer'
        ];
    }
}
