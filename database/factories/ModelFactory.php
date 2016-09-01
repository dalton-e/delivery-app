<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(DeliveryApp\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(DeliveryApp\Models\Client::class, function(Faker\Generator $faker) {
    return [
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'city' => $faker->city,
        'state' => $faker->country,
        'zipcode' => $faker->postcode
    ];
});

$factory->define(DeliveryApp\Models\Category::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(DeliveryApp\Models\Product::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'price' => $faker->numberBetween(10, 50)
    ];
});

$factory->define(DeliveryApp\Models\Order::class, function(Faker\Generator $faker) {
    return [
        'client_id' => $faker->numberBetween(1, 10),
        'total' => $faker->numberBetween(100, 5000),
        'date' => $faker->date(),
        'status' => 0
    ];
});

$factory->define(DeliveryApp\Models\OrderItem::class, function(Faker\Generator $faker) {
    return [
        'product_id' => $faker->numberBetween(1, 25),
        'quantity' => $faker->numberBetween(1, 3),
        'price' => $faker->numberBetween(10, 200),
    ];
});
