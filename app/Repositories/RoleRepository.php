<?php

namespace App\Repositories;

use App\Entities\Role;

class RoleRepository extends Repository
{
    public function __construct(Role $role)
    {
        $this->object = $role;
    }
}
