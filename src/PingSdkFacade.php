<?php

namespace MyMonitor\PingSdk;

use Illuminate\Support\Facades\Facade;

class PingSdkFacade extends Facade {
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'mymonitor-pingsdk'; }
}