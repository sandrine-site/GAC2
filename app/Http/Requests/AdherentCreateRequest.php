<?php

namespace App\Http\Requests;

use App\Adherent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationData;
use Illuminate\Validation\Validator;

class AdherentCreateRequest extends FormRequest
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

        $r =
            [
                'date_naissance_J' => 'required|integer',
                'date_naissance_M' => 'required|integer',
                'date_naissance_A' => 'required|integer'
            ];
        if ('date_naissance_A'!=0)
        {
        $age = getdate ()[ 'year' ] - $_POST[ 'date_naissance_A' ];
        }
        $majeur = false;

        $r = $r = array_merge ($r,
            [
                'nom' => 'required|string|max:50',
                'prenom' => 'required|string|max:50',
                'lieuNaissance' => 'required|string|max:50',
                'adresse1' => 'required|string|max:200',
                'ville' => 'required|string|max:50',
                'cp' => 'required|integer',
                'email1' => 'required|email|max:255',
                'email2' => 'nullable|email|max:255',
                'section_id' => 'required|integer',
                'nomUrgence' => 'required|string|max:50',
                'telUrgence' => 'required|regex:#^0[1-9]([-. /]?[0-9]{2}){4}$#',
                "sexe" => 'required|string|max:50',
                "telephone_adherent" => 'nullable|regex:#^0[1-9]([-. /]?[0-9]{2}){4}$#',
                "adresse2" => 'nullable|string|max:200',
                "entrainement" => 'nullable|string|max:200',
                "medicales" => 'nullable|string|max:200',
                "heureSemaine" => 'required_if:section_id,4'
            ]);
        if ('date_naissance_A'!=0){
        if ( $age<18 ) {
            $r = array_merge ($r, [ 'telephone_Resp1' => 'required_without:telephone_Resp2|regex:#^0[1-9]([-. /]?[0-9]{2}){4}$#', 'telephone_Resp2' => 'nullable|regex:#^0[1-9]([-. /]?[0-9]{2}){4}$#' ]);
        }
    }
        return $r;
    }
}
