<?php

namespace Ingenious\Shopping\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Ingenious\Shopping\Concerns\CanBePurchased;
use Ingenious\Shopping\Contracts\Buyable;

/**
 * @property int price
 * @property string description
 * @property string photo
 * @property array meta
 */
class Product extends Model implements Buyable
{
    use CanBePurchased;

    protected $guarded = [];

    protected $casts = [
        'meta' => 'array'
    ];
}