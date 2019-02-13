<?php

namespace Phambinh\Laraexcepnotify\Listeners;

use Phambinh\Laraexcepnotify\Events\HasExceptionEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Phambinh\Laraexcepnotify\Facades\ExceptionNotify;
use Phambinh\Laraexcepnotify\Notifications\HasExceptionNotification;

class HasExceptionListener
{
    public function handle(HasExceptionEvent $event)
    {
        if (config('notification.lara_exception_notify.enable')) {
            $notify = new HasExceptionNotification($event->exception);
            ExceptionNotify::send($notify);
        }
    }
}
