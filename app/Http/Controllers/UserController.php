<?php

namespace App\Http\Controllers;

use App\Services\UserService;

class UserController extends BaseController
{
    public function __construct(UserService $userService)
    {
        $this->service = $userService;
        $this->model = 'user';
        $this->modname = '用户';
    }
}
