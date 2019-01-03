<?php

namespace Ingenious\Shopping\Concerns;


trait CanBePurchased
{
    /**
     * Get the id
     *
     * @return int
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * Get the type of buyable
     *
     * @return string
     */
    public function type()
    {
        return __CLASS__;
    }

    /**
     * Get the price of the item
     *
     * @return float
     */
    public function getPrice()
    {
        return (float) $this->price;
    }

    /**
     * Get the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }
}