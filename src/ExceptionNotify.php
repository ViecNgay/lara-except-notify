<?php

namespace Phambinh\Laraexcepnotify;

use Phambinh\Laraexcepnotify\Facades\Notification;
use Exception;

class ExceptionNotify
{
    public function send($notify)
    {
        if (!config('notification.lara_exception_notify.slack_web_hook_url')) {
            throw new Exception('Can not find config "notification.lara_exception_notify.slack_web_hook_url" information');
        }

        Notification::route('slack', config('notification.lara_exception_notify.slack_web_hook_url'))->notify($notify);
    }
}
