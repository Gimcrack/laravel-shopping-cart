<?php

namespace Ingenious\Shopping\Contracts;

/**
 * Interface Buyable
 *
 * @property $id
 * @package Ingenious\Shopping\Contracts
 */
interface Buyable
{
    public function id();

    public function type();

    public function getPrice();

    public function getDescription();

    public function getPhoto();
}