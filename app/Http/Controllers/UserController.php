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

    public function index($action = null, $id = null, $view = 'index')
    {
        $action = is_null($action) ? 'create' : $action;
        $items = $this->service->getAll();

        $item = null;
        if (!is_null($id)) {
            $item = $this->service->get($id);
        }
        
        return view('pages.' . $view, [
            'modname' => $this->modname,
            'model' => $this->model,
            'action' => $action,
            'id' => $id,
            'items' => $items,
            'item' => $item,
        ]);
    }
}
