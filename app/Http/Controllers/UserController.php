<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use App\Services\UserService;

class UserController extends BaseController
{
    public function __construct(UserService $userService)
    {
        $this->service = $userService;
        $this->model = 'user';
        $this->modname = '用户';
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
