<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 16/03/2019
 * Time: 21:46
 */

namespace App\Repositories;

use App\Section;
use App\Tarif;


class TarifRepository extends ResourceRepository
{
    public function __construct(Tarif $tarif)
    {
        $this->model = $tarif;
    }

}
