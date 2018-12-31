<?php

namespace Ingenious\Shopping\Models;

use Illuminate\Support\Collection;

class CartItemCollection extends Collection
{
    /**
     * Create a new collection
     *
     * @param $items
     * @return \Ingenious\Shopping\Models\CartItemCollection
     */
    public static function collect($items)
    {
        return new static($items);
    }

    /**
     * Create a new collection.
     *
     * @param  mixed  $items
     * @return void
     */
    public function __construct($items = [])
    {
        $this->items = $this->getArrayableItems($items);
    }

    /**
     * Get the subtotal of all the items
     *
     * @return float
     */
    public function subtotal()
    {
        return $this->pluck('item.subtotal')->sum();
    }

    /**
     * Get the item count
     *
     * @return int
     */
    public function itemCount()
    {
        return $this->pluck('item.quantity')->sum();
    }
}