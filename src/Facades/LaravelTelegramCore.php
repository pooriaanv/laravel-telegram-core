<?php

namespace TelegramCore\LaravelTelegramCore\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelTelegramCore extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laraveltelegramcore';
    }
}
