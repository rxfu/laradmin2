<?php

namespace App\Services;

use App\Exceptions\GeneralException;
use App\Repositories\LogRepository;
use Illuminate\Support\Facades\Auth;

class LogService extends Service
{
    public function __construct(LogRepository $logs)
    {
        $this->repository = $logs;
    }

    public function write($level, $action, $content)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'ip' => request()->ip(),
            'level' => $level,
            'path' => request()->path(),
            'method' => request()->method(),
            'action' => $action,
            'entity' => $this->repository->getModel(),
            'content' => json_encode($content),
        ];

        try {
            $this->repository->store($data);
        } catch (Exception $e) {
            throw new GeneralException('日志保存失败');
        }
    }
}
