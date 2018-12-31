<?php

namespace Ingenious\Shopping\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Ingenious\Shopping\Concerns\CanBePurchased;
use Ingenious\Shopping\Contracts\Buyable;

class Item extends Model implements Buyable
{
    use CanBePurchased;

    protected $guarded = [];
}