<?php

use Faker\Generator as Faker;

$factory->define(Ingenious\Shopping\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'price' => null,
        'description' => null,
        'photo' => null,
        'meta' => null,
    ];
});
