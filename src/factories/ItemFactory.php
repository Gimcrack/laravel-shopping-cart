<?php

use Faker\Generator as Faker;

$factory->define(Ingenious\Shopping\Models\Item::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'price' => $faker->randomFloat(2,0,100)
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


