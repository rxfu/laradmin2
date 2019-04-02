<?php

namespace App\Exceptions;

use App\Services\LogService;
use Exception;

class GeneralException extends Exception
{
    protected $model;

    protected $action;

    protected $level;

    public function __construct($message, $model, $action, $level = 'error') {
        $this->model = $model;
        $this->action = $action;
        $this->level = $level;

        parent::__construct($message);
    }

    /**
     * Report or log an exception.
     *
     * @param App\Services\LogService $log
     * @return void
     */
    public function report(LogService $log)
    {
        $log->write($this->level, $this->action, $this->model, $this->getMessage());
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return back()->withErrors($this->getMessage())->withInput();
    }
}
