<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 16/03/2019
 * Time: 21:46
 */

namespace App\Repositories;
use App\Creneau;


class CreneauRepository extends ResourceRepository
{
    public function __construct(Creneau $creneau)
    {
        $this->model = $creneau;
    }

}
