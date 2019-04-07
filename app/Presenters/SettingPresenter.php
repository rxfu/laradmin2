<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class SettingPresenter extends Presenter
{
    public function isEnable()
    {
        return $this->is_enable ? '是' : '否';
    }
}
