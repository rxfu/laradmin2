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
        $this->service->write('info', 'created', get_class($model), $model->getAttributes());
    }

    public function updating($model)
    {
        $this->service->write('info', 'updating', get_class($model), $model->getAttributes());
    }

    public function updated($model)
    {
        $this->service->write('info', 'updated', get_class($model), $model->getAttributes());
    }

    public function deleting($model)
    {
        $this->service->write('info', 'deleting', get_class($model), $model->getAttributes());
    }
}
