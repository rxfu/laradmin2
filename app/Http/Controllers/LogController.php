<?php

namespace App\Http\Controllers;

use App\Services\LogService;
use Illuminate\Http\Request;

class LogController extends BaseController
{
    public function __construct(LogService $logService)
    {
        $this->service = $logService;
        $this->model = 'log';
        $this->modname = '日志';
        $this->view = 'list';
    }
}
