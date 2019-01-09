<?php

namespace Ingenious\Shopping\Models;


use Illuminate\Database\Eloquent\Model;


class Item extends Model
{
    protected $guarded = [];

    protected $casts = [
        'base_meta' => 'array'
    ];

    /**
     * Set the base_meta
     *
     * @param $value
     */
    public function setMetaAttribute($value)
    {
        $this->attributes['base_meta'] = json_encode($value);
    }

    /**
     * Set the Item base_price
     *
     * @param $base_price
     */
    public function setPrice($base_price)
    {
        $this->update(compact('base_price'));
    }
}