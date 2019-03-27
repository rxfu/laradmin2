<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function __construct(UserService $userService)
    {
        $this->service = $userService;
        $this->model = 'user';
        $this->subtitle = '用户';
    }
}
