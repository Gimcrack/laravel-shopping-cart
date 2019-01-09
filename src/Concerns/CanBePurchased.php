<?php

namespace Ingenious\Shopping\Concerns;


use Ingenious\Shopping\Models\Variant;

trait CanBePurchased
{
    /**
     * Get the id
     *
     * @return int
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * Get the type of buyable
     *
     * @return string
     */
    public function type()
    {
        return __CLASS__;
    }

    /**
     * Get the price of the item
     *
     * @return int | null
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the price
     *
     * @param $price
     */
    public function setPrice($price)
    {
        $this->update(compact('price'));
    }

    /**
     * Get the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the description
     *
     * @param $description
     */
    public function setDescription($description)
    {
        $this->update(compact('description'));
    }

    /**
     * Get the photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the photo
     *
     * @param $photo
     */
    public function setPhoto($photo)
    {
        $this->update(compact('photo'));
    }

    /**
     * Get the meta
     *
     * @return array
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * Set the meta
     *
     * @param $meta
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;
        $this->save();
    }

    /**
     * Set the meta
     *
     * @param $value
     */
    public function setMetaAttribute($value)
    {
        $this->attributes['meta'] = json_encode($value);
    }

    /**
     * A Product morphs a Variant
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function variant()
    {
        return $this->morphOne(Variant::class, 'buyable');
    }
}