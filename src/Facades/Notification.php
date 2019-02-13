<?php

namespace ViecNgay\Laraexcepnotify\Facades;

use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\Facades\Facade;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Support\Testing\Fakes\NotificationFake;

class Notification extends Facade
{
    public static function fake()
    {
        static::swap($fake = new NotificationFake);

        return $fake;
    }

    public static function route($channel, $route)
    {
        return (new AnonymousNotifiable)->route($channel, $route);
    }

    protected static function getFacadeAccessor()
    {
        return ChannelManager::class;
    }
}
