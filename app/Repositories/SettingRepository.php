<?php

namespace App\Repositories;

use App\Entities\Setting;

class SettingRepository extends Repository
{
    public function __construct(Setting $setting)
    {
        $this->object = $setting;
    }
}
