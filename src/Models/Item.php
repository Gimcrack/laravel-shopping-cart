<?php

namespace Ingenious\Shopping\Models;


use Illuminate\Database\Eloquent\Model;


class Item extends Model
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
     * An item has a Buyable thing
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
        return (int) ($this->buyable->price ?? $this->base_price);
    }

    /**
     * Get the description attribute
     *
     * @return mixed
     */
    public function getDescriptionAttribute()
    {
        return $this->buyable->description ?? $this->base_description;
    }

    /**
     * Get the photo attribute
     *
     * @return mixed
     */
    public function getPhotoAttribute()
    {
        return $this->buyable->photo ?? $this->base_photo;
    }

    /**
     * Get the meta attribute
     *
     * @return array
     */
    public function getMetaAttribute()
    {
        return array_merge($this->base_meta ?? [], $this->buyable->meta ?? []);
    }
}