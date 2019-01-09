<?php

use Faker\Generator as Faker;
use Ingenious\Shopping\Models\Item;
use Ingenious\Shopping\Models\Product;

$factory->define(Ingenious\Shopping\Models\Variant::class, function (Faker $faker) {
    return [
        'item_id' => factory(Item::class)->create()->id,
        'buyable_type' => Product::class,
        'buyable_id' => factory(Product::class)->create()->id,
    ];
});
