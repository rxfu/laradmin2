<?php

namespace App\Services;

use App\Repositories\Repository;

class Service
{
    protected $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function get($id)
    {
        return $this->repository->get($id);
    }

    public function getAll($order = 'id', $direction = 'asc')
    {
        return $this->repository->getAll($order, $direction);
    }

    public function store($data)
    {
        return $this->repository->store($data);
    }

    public function update($id, $data)
    {
        $this->repository->update($id, $data);
    }

    public function delete($ids)
    {
        $this->repository->deleteAll($ids);
    }
}
