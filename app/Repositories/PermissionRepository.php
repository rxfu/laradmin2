<?php

namespace App\Repositories;

use App\Entities\Permission;

class PermissionRepository extends Repository
{
    public function __construct(Permission $permission)
    {
        $this->object = $permission;
    }
}
