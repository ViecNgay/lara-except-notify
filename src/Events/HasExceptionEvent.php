<?php

namespace ViecNgay\Laraexcepnotify\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Exception;

class HasExceptionEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $exception;

    public function __construct(Exception $exception)
    {
        $this->exception = $exception;
    }
}
