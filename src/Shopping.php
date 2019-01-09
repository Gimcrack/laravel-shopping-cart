<?php

namespace Ingenious\Shopping;


use Ingenious\Shopping\Contracts\Buyable;
use Ingenious\Shopping\Models\Cart;
use Ingenious\Shopping\Models\CartContents;
use Ingenious\Shopping\Models\Item;
use Ingenious\Shopping\Models\Variant;
use function last;

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
     * Add the Variant to cart
     *
     * @param \Ingenious\Shopping\Models\Variant $variant
     * @param int $quantity
     */
    public function addToCart(Variant $variant, $quantity = 1)
    {
        if ( $quantity <= 0 ) {
            $this->removeFromCart($variant);
            return;
        }

        static::cart()->contents()->detach($variant);

        static::cart()->contents()->attach($variant,compact('quantity'));
    }

    /**
     * Remove the Variant from the cart
     *
     * @param \Ingenious\Shopping\Models\Variant $variant
     */
    public function removeFromCart(Variant $variant)
    {
        static::cart()->contents()->detach($variant);
    }

    /**
     * Get the cart's items
     *
     * @return \Ingenious\Shopping\Models\CartContents
     */
    public function contents()
    {
        return CartContents::collect(static::cart()->fresh()->contents);
    }

    /**
     * Get the item count
     *
     * @return int
     */
    public function count()
    {
        return static::contents()->itemCount() ?? 0;
    }

    /**
     * Get the distinct item count
     *
     * @return int
     */
    public function distinctCount()
    {
        return static::contents()->count() ?? 0;
    }

    /**
     * Get the cart's subtotal
     *
     * @return float
     */
    public function subtotal()
    {
        return static::contents()->subtotal();
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
