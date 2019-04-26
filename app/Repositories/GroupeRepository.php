<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 16/03/2019
 * Time: 21:46
 */

namespace App\Repositories;
use App\Groupe;


class GroupeRepository extends ResourceRepository
{
    public function __construct(Groupe $groupe)
    {
        $this->model = $groupe;
    }

}
