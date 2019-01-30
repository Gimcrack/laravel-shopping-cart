<?php

namespace Ingenious\Shopping\Concerns;

use Ingenious\Shopping\Billing\PaymentGatewayFake;
use Ingenious\Shopping\Facades\PaymentGateway;

trait PaymentGatewayCanBeFaked
{
    /**
     * Swap out the ticket provider
     * @method fake
     *
     * @return   \Ingenious\Shopping\Contracts\PaymentGateway
     */
    public function fake()
    {
        PaymentGateway::swap( new PaymentGatewayFake );
        return app('PaymentGateway');
    }

    /**
     * Swap out the fake provider for a real one
     * @method dontFake
     *
     * @return   \Ingenious\Shopping\Contracts\PaymentGateway
     */
    public function dontFake()
    {
        PaymentGateway::swap( new PaymentGateway );
        return app('PaymentGateway');
    }
}