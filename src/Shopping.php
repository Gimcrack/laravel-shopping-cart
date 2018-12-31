<?php

namespace Ingenious\Shopping;


use Ingenious\Shopping\Models\Cart;
use Ingenious\Shopping\Models\CartItemCollection;
use Ingenious\Shopping\Models\Item;

class Shopping {

    /**
     * @var Cart
     */
    protected $cart;

    /**
     * Get the active cart
     */
    public function cart()
    {
        if ( $this->cart )
            return $this->cart;

        $this->cart = Cart::active();
        return $this->cart;
    }

    /**
     * Get orders
     *
     * @param null $email
     * @return \Illuminate\Support\Collection
     */
    public function orders($email = null)
    {
        if ( auth()->check() )
        {
            return Cart::ofUser()->orders()->get();
        }

        return Cart::ofEmail($email)->orders()->get();
    }

    /**
     * Add the item to cart
     *
     * @param \Ingenious\Shopping\Models\Item $item
     * @param int $quantity
     */
    public function addToCart(Item $item, $quantity = 1)
    {
        static::cart()->items()->detach($item->id);

        static::cart()->items()->attach($item->id,compact('quantity'));
    }

    /**
     * Get the cart's items
     *
     * @return \Ingenious\Shopping\Models\CartItemCollection
     */
    public function items()
    {
        return CartItemCollection::collect(static::cart()->items);
    }

    /**
     * Get the item count
     *
     * @return int
     */
    public function count()
    {
        return static::items()->itemCount() ?? 0;
    }

    /**
     * Get the distinct item count
     *
     * @return int
     */
    public function distinctCount()
    {
        return static::items()->count() ?? 0;
    }

    /**
     * Get the cart's subtotal
     *
     * @return float
     */
    public function subtotal()
    {
        return static::items()->subtotal();
    }

    /**
     * Get the tax due
     *
     * @return float
     */
    public function tax()
    {
        return config('shopping.taxrate') * ( static::subtotal() - static::discount() );
    }

    /**
     * Get the discount amount
     *
     * @return float
     */
    public function discount()
    {
        return config('shopping.discount') * static::subtotal();
    }

    /**
     * Get the total due
     *
     * @return int
     */
    public function total()
    {
        return round(static::subtotal() + static::tax() - static::discount());
    }
}
