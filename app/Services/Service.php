<?php

namespace App\Services;

use App\Repositories\Repository;

class Service {

	protected $repository;

	public function __construct(Repository $repository) {
		$this->repository = $repository;
	}
}