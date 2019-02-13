<?php

namespace Phambinh\Laraexcepnotify;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;

class ServiceProvider extends EventServiceProvider
{
    protected $listen = [
        'Phambinh\Laraexcepnotify\Events\HasExceptionEvent' => [
            'Phambinh\Laraexcepnotify\Listeners\HasExceptionListener'
        ]
    ];

    public function boot()
    {
        parent::boot();

        $this->publishes([
            __DIR__ .'/../config/notification.php' => config_path('notification.php')
        ], 'config');
    }

    public function register()
    {
        app()->bind('exception_notify', ExceptionNotify::class);
    }
}
