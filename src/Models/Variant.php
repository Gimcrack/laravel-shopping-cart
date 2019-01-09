<?php

namespace Ingenious\Shopping\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Variant extends Model
{
    protected $guarded = [];

    protected $casts = [
        'meta' => 'array'
    ];

    protected $appends = [
        'price',
        'description',
        'photo',
        'meta'
    ];

    /**
     * A Variant belongsTo an Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * A Variant has a Buyable
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
        return $this->buyable->getPrice() ?? $this->item->base_price;
    }

    /**
     * Get the description attribute
     *
     * @return string
     */
    public function getDescriptionAttribute()
    {
        return $this->buyable->getDescription() ?? $this->item->base_description;
    }

    /**
     * Get the photo attribute
     *
     * @return string
     */
    public function getPhotoAttribute()
    {
        return $this->buyable->getPhoto() ?? $this->item->base_photo;
    }

    /**
     * Get the meta attribute
     *
     * @return array
     */
    public function getMetaAttribute()
    {
        return array_merge( $this->item->base_meta, $this->buyable->getMeta() );
    }
}