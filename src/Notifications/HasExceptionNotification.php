<?php

namespace Phambinh\Laraexcepnotify\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\SlackMessage;
use Exception;

class HasExceptionNotification extends Notification
{
    use Queueable;

    protected $exception;

    public function __construct(Exception $exception)
    {
        $this->exception = $exception;
    }

    public function via($notifiable)
    {
        if (config('notification.lara_exception_notify.channel')) {
            return config('notification.lara_exception_notify.channel');
        }

        return ['slack'];
    }

    public function toSlack($notifiable)
    {
        return (new SlackMessage)
                ->error()
                ->content($this->exception->getMessage())
                ->attachment(function ($attachment) {
                    $attachment->title(get_class($this->exception))
                        ->content('File: ' . $this->exception->getFile() . ' on line' . $this->exception->getLine());
                });
    }
}
