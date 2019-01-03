<?php

namespace Ingenious\Shopping\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Variant extends Model
{
    protected $guarded = [];

    protected $casts = [
        'details' => 'array'
    ];

    protected $appends = [
        'price',
        'description'
    ];

    /**
     * A Variant belongs to a buyable thing
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function buyable()
    {
        return $this->morphTo();
    }

    /**
     * Get the price attribute
     *
     * @return int
     */
    public function getPriceAttribute()
    {
        return $this->details['price'] ?? $this->buyable->price;
    }

    /**
     * Get the description attribute
     *
     * @return string
     */
    public function getDescriptionAttribute()
    {
        return $this->details['description'] ?? $this->buyable->description;
    }
}