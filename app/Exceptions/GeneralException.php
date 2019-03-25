<?php

namespace App\Exceptions;

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
    	parent::report($this);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return back()->flash('error', $this->getMessage());
    }
}
