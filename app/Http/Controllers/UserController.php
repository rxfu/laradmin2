<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use App\Services\DepartmentService;
use App\Services\UserService;

class UserController extends BaseController
{
    private $departmentService;

    public function __construct(UserService $userService, DepartmentService $departmentService)
    {
        $this->service = $userService;
        $this->departmentService = $departmentService;
        $this->model = 'user';
        $this->modname = '用户';
    }

    public function index($action = null, $id = null)
    {
        $action = is_null($action) ? 'create' : $action;
        $items = $this->service->getAll();

        $item = null;
        if (!is_null($id)) {
            $item = $this->service->get($id);
        }

        $departments = $this->departmentService->getIsEnable();
        
        return view('pages.list', [
            'modname' => $this->modname,
            'model' => $this->model,
            'action' => $action,
            'id' => $id,
            'items' => $items,
            'item' => $item,
            'departments' => $departments,
        ]);
    }

    public function store(SaveUserRequest $request)
    {
        return $this->postSave($request);
    }

    public function update(SaveUserRequest $request, $id)
    {
        return $this->putSave($request, $id);
    }
}
