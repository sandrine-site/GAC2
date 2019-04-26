<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 16/03/2019
 * Time: 21:46
 */

namespace App\Repositories;
use App\Fonction;

class FonctionRepository extends ResourceRepository
{
    public function __construct(Fonction $fonction)
    {
        $this->model = $fonction;
    }


}
