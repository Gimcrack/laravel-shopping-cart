<?php

use Faker\Generator as Faker;
use Ingenious\Shopping\Models\Item;

$factory->define(Ingenious\Shopping\Models\Variant::class, function (Faker $faker) {
    return [
        'buyable_id' => factory(Item::class)->create()->id,
        'buyable_type' => Item::class,
        'details' => [
            'description' => $faker->sentence,
            'price' => $faker->randomFloat(2,0,100)
        ]
    ];
});
//
//$factory->state(Ingenious\Shopping\Models\Cart::class, 'user', function( Faker $faker ) {
//    return [
//        'user_id' => factory(App\User::class)->create()->id,
//        'session_id' => null,
//        'completed_flag' => false
//    ];
//});
//
//$factory->state(Ingenious\Shopping\Models\Cart::class, 'session', function( Faker $faker ) {
//    return [
//        'user_id' => null,
//        'session_id' => session()->getId(),
//        'completed_flag' => false
//    ];
//});
//
//$factory->state(Ingenious\Shopping\Models\Cart::class, 'order', function( Faker $faker ) {
//    return [
//        'user_id' => factory(App\User::class)->create()->id,
//        'session_id' => null,
//        'completed_flag' => true
//    ];
//});


