<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveRoleRequest;
use App\Services\RoleService;

class RoleController extends BaseController
{
    public function __construct(RoleService $roleService, SaveRoleRequest $request)
    {
        $this->service = $roleService;
        $this->request = $request;
        $this->model = 'role';
        $this->modname = '角色';
    }
}
