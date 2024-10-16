<?php

namespace Mbjonesua\LaravelUserProxy;

use Illuminate\Support\Facades\Facade;




class LaravelUserProxyFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-user-proxy';
    }
}
