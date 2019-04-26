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


class PayementRepository extends ResourceRepository
{
    public function __construct(Payement $payement)
    {
        $this->model = $payement;
    }

}
