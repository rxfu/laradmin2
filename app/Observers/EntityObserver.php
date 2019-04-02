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
        $this->service->write('INFO', 'INSERT', $model->getAttributes());
    }

    public function updating($model)
    {
        $this->service->write('INFO', 'UPDATE', $model->getAttributes());
    }

    public function updated($model)
    {
        $this->service->write('INFO', 'UPDATE', $model->getAttributes());
    }

    public function deleting($model)
    {
        $this->service->write('INFO', 'DELETE', $model->getAttributes());
    }
}
