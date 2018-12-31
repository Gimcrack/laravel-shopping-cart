<?php

namespace Ingenious\Shopping\Concerns;

trait CanBePurchased
{
    /**
     * Get the price of the item
     *
     * @return float
     */
    public function getPrice()
    {
        return (float) $this->price;
    }
}