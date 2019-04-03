<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use App\Services\UserService;

class UserController extends BaseController
{
    public function __construct(UserService $userService, SaveUserRequest $request)
    {
        $this->service = $userService;
        $this->request = $request;
        $this->model = 'user';
        $this->modname = '用户';
    }
}
