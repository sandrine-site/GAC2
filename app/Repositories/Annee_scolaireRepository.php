<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 16/03/2019
 * Time: 21:46
 */

namespace App\Repositories;
use App\Annee_scolaire;


class Annee_scolaireRepository extends ResourceRepository
{
    public function __construct(Annee_scolaire $annee_scolaire)
    {
        $this->model = $annee_scolaire;
    }

}
