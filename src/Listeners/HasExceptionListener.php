<?php

namespace ViecNgay\Laraexcepnotify\Listeners;

use ViecNgay\Laraexcepnotify\Events\HasExceptionEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use ViecNgay\Laraexcepnotify\Facades\ExceptionNotify;
use ViecNgay\Laraexcepnotify\Notifications\HasExceptionNotification;

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
