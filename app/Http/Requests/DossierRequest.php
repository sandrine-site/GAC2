<?php

namespace App\Http\Requests;

use App\Dossier;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationData;
use Illuminate\Validation\Validator;

class DossierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize ()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules ()
    {
        return [
            'adherent_id' => 'required|integer',
            'certifMedical' => 'required|boolean',
            'photo' => 'required|boolean',
            'autorisationsRendues' => 'required|boolean',
            'payementOk' => 'required|boolean',
            'aidesSociales' => 'required|boolean',
            'recuDemande' => 'required|boolean',
        ];
    }
}
