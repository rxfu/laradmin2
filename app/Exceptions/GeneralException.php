<?php

namespace App\Exceptions;

use App\Entities\Log;
use App\Repositories\LogRepository;
use App\Services\LogService;
use Exception;

class GeneralException extends Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        $log = new LogService(new LogRepository(new Log));

        $log->write('ERROR', 'EXCEPTION', ['message' => $this->getMessage()]);
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
