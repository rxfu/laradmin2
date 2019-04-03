<?php

namespace App\Observers;

use App\Services\LogService;

class EntityObserver
{
    protected $service;

    public function __construct(LogService $logService)
    {
        $this->service = $logService;
    }

    public function created($model)
    {
        $content = [
            'message' => '创建对象成功',
            'data' => $model->getAttributes(),
        ];

        $this->service->write($content, $model, 'created', 'info');
    }

    public function updating($model)
    {
        $content = [
            'message' => '更新对象',
            'data' => $model->getOriginal(),
        ];

        $this->service->write($content, $model, 'updating', 'info');
    }

    public function updated($model)
    {
        $content = [
            'message' => '更新对象成功',
            'data' => $model->getAttributes(),
        ];

        $this->service->write($content, $model, 'updated', 'info');
    }

    public function deleting($model)
    {
        $content = [
            'message' => '删除对象',
            'data' => $model->getAttributes(),
        ];

        $this->service->write($content, $model, 'deleting', 'info');
    }
}
