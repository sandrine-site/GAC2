<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayementCreateRequest extends FormRequest
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
            'mode'=>'required|string|max:50',
            'montant'=>'required|decimal',
            'encaisse_mois'=>'required|date',
            'numcheque'=>'required|string',
            'adherent_id'=>'required|integer',

        ];
    }
}
