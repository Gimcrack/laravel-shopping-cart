<?php

namespace Ingenious\Shopping\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CartItem extends Pivot
{
    protected $guarded = [];

    protected $casts = [
        'quantity' => 'int',
        'price' => 'int',
        'subtotal' => 'float',
    ];

    protected $appends = [
        'subtotal'
    ];

    /**
     * Get the subtotal attribute
     *
     * @return float|int
     */
    public function getSubtotalAttribute()
    {
        return $this->item->price * $this->quantity;
    }

    /**
     * A CartItem has an Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}