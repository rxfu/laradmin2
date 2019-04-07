<?php

namespace App\Listeners;

use App\Services\LogService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogFailedLogin
{
    private $service;
    
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(LogService $logService)
    {
        $this->service = $logService;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $content = [
            'message' => '登录失败',
        ];

        // $this->service->write($content, $event->user, 'login', 'warning');
    }
}
