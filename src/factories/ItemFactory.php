<?php

use Faker\Generator as Faker;

$factory->define(Ingenious\Shopping\Models\Item::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'base_description' => $faker->sentence,
        'base_price' => $faker->randomFloat(2,0,100),
        'base_photo' => $faker->word,
        'base_meta' => []
    ];
});


