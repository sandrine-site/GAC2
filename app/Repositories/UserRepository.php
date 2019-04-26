<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 16/03/2019
 * Time: 21:46
 */

namespace App\Repositories;
use App\User;

class UserRepository extends ResourceRepository
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }


}
