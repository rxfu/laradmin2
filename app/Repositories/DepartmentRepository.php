<?php

namespace App\Repositories;

use App\Entities\Department;

class DepartmentRepository extends Repository
{
    public function __construct(Department $department)
    {
        $this->object = $department;
    }
}
