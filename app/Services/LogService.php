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

    public function getAll($order = 'created_at', $direction = 'desc')
    {
        return parent::getAll('created_at', 'desc');
    }

    public function write($content, $model, $action, $level)
    {
        $entity = basename(str_replace('\\', '/', get_class($model)));
        $entity_id = is_null($model->getKey()) ? 0 : $model->getKey();
        $content = is_array($content) ? $content : [$content];

        $data = [
            'user_id' => Auth::id(),
            'ip' => request()->ip(),
            'level' => $level,
            'path' => request()->path(),
            'method' => request()->method(),
            'action' => $action,
            'entity' => $entity,
            'entity_id' => $entity_id,
            'content' => $content,
        ];

        return parent::store($data);
    }
}
