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

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function store($data) {
    	return $this->repository->store($data);
    }
}
