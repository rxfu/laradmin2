<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Services\UserService;

class UserController extends BaseController
{
    public function __construct(UserService $userService, CreateUserRequest $userRequest)
    {
        $this->service = $userService;
        $this->request = $userRequest;
        $this->model = 'user';
        $this->subtitle = '用户';
    }
}
