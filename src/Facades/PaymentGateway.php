<?php

namespace Ingenious\Shopping\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see Ingenious\Shopping\PaymentGateway
 */
class PaymentGateway extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'PaymentGateway';
    }
}
