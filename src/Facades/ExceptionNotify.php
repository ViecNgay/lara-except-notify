<?php

namespace Phambinh\Laraexcepnotify\Facades;

use Illuminate\Support\Facades\Facade;

class ExceptionNotify extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'exception_notify';
    }
}
