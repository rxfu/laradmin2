<?php

namespace App\Services;

use App\Exceptions\GeneralException;
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
        try {
            return $this->repository->store($data);
        } catch (Exception $e) {
            throw new GeneralException($this->repository->getModel() . '保存失败', $this->repository->getModel(), 'store');
        }
    }

    public function update($id, $data)
    {
        try {
            $this->repository->update($id, $data);
        } catch (Exception $e) {
            throw new GeneralException($this->repository->getModel() . '更新失败', $this->repository->getModel(), 'update');
        }
    }

    public function delete($ids)
    {
        try {
            $this->repository->deleteAll($ids);
        } catch (Exception $e) {
            throw new GeneralException($this->repository->getModel() . '删除失败', $this->repository->getModel(), 'delete');
        }
    }
}
