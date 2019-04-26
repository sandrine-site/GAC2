<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 16/03/2019
 * Time: 21:46
 */

namespace App\Repositories;

use App\Section;


class SectionRepository extends ResourceRepository
{
    public function __construct(Section $section)
    {
        $this->model = $section;
    }

}
