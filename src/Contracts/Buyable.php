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

    public function setPrice($price);

    public function getDescription();

    public function setDescription($description);

    public function getPhoto();

    public function setPhoto($photo);

    public function getMeta();

    public function setMeta($meta);

    public function variant();
}