<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePermissionRequest;
use App\Services\PermissionService;
use Illuminate\Http\Request;

class PermissionController extends BaseController
{
    public function __construct(PermissionService $permissionService, SavePermissionRequest $request)
    {
        $this->service = $permissionService;
        $this->request = $request;
        $this->model = 'permission';
        $this->modname = '权限';
    }
}
