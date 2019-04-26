<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 16/03/2019
 * Time: 21:46
 */

namespace App\Repositories;
use App\Groupe;
use App\Payement;


class DossierRepository extends ResourceRepository
{
    public function __construct(Dossier $dossier)
    {
        $this->model = $dossier;
    }

}
