<?php

namespace App\Repositories;

use App\Entities\Log;

class LogRepository extends Repository
{
    public function __construct(Log $log)
    {
        $this->object = $log;
    }
}
