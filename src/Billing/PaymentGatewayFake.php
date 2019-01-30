<?php

namespace Ingenious\Shopping\Billing;

use Ingenious\Shopping\Contracts\PaymentGateway as PaymentGatewayContract;

class PaymentGatewayFake extends PaymentGatewayStub implements PaymentGatewayContract
{
    public function token(): string
    {
        // TODO: Implement token() method.
    }

    public function total(): int
    {
        // TODO: Implement total() method.
    }
}