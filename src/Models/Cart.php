<?php

namespace Ingenious\Shopping\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Cart extends Model
{
    protected $guarded = [];

    protected $casts = [
        'completed_flag' => 'bool'
    ];

    /**
     * Get the cart's User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A cart can have many variants
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function contents()
    {
        return $this->belongsToMany(Variant::class, 'cart_variant')
            ->using(CartVariant::class)
            ->as('options')
            ->withPivot(['quantity']);
    }

    /**
     * Get the active cart
     */
    public static function active()
    {
        if ( auth()->check() )
        {
            return static::firstOrCreate([
                'user_id' => auth()->id(),
                'completed_flag' => false
            ]);
        }

        return static::firstOrCreate([
            'session_id' => session()->getId(),
            'completed_flag' => false
        ]);
    }

    /**
     * Get the completed orders
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeOrders(Builder $query)
    {
        return $query->where('completed_flag',true);
    }

    /**
     * Get carts for the current user
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeOfUser(Builder $query)
    {
        return $query->where('user_id',auth()->id());
    }

    /**
     * Get carts for the specified email
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeOfEmail(Builder $query, $email)
    {
        return $query->where('email',$email);
    }

    /**
     * Get carts for the current session
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeSession(Builder $query)
    {
        return $query->where('session_id',session()->getId());
    }
}