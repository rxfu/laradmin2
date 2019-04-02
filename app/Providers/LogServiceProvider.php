<?php

namespace App\Providers;

use App\Observers\EntityObserver;
use Illuminate\Support\ServiceProvider;

class LogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $observers = config('setting.observers');

        foreach ($observers as $observer) {
            $observer::observe(EntityObserver::class);
        }
    }
}
