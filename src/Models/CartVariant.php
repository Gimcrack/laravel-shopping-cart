<?php

namespace Ingenious\Shopping\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CartVariant extends Pivot
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
        return $this->variant->price * $this->quantity;
    }

    /**
     * A CartVariant has a Variant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }
}