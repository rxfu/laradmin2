<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveSettingRequest;
use App\Services\SettingService;
use Illuminate\Http\Request;

class SettingController extends BaseController
{
    public function __construct(SettingService $settingService, SaveSettingRequest $request)
    {
        $this->service = $settingService;
        $this->request = $request;
        $this->model = 'setting';
        $this->modname = '系统设置';
    }
}
