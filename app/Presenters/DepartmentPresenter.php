<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class DepartmentPresenter extends Presenter
{
    public function isEnable()
    {
        return $this->is_enable ? '是' : '否';
    }
}
