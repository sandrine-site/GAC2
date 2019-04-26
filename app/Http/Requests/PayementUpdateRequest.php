<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayementUpdateRequest extends FormRequest
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
                'mode'=>'sometime|string|max:50',
                'montant'=>'sometime|decimal',
                'encaisse_mois'=>'sometime|date',
                'numcheque'=>'sometime|string|max:50',

        ];
    }
}
