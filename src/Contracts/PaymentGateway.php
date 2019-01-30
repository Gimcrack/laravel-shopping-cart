<?php

namespace Ingenious\Shopping\Contracts;

interface PaymentGateway
{
    public function token() : string;

    public function implementation() : string;

    public function total() : int;
}