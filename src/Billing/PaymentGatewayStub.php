<?php

namespace Ingenious\Shopping\Billing;

use Ingenious\Shopping\Concerns\PaymentGatewayCanBeFaked;

abstract class PaymentGatewayStub
{
    use PaymentGatewayCanBeFaked;

    public function implementation(): string
    {
        return get_class($this);
    }
}