<?php

use Faker\Generator as Faker;

$factory->define(App\Tenant::class, function (Faker $faker) {
    return [

        'name' => $faker->name, 
        'phone' => $faker->phoneNumber, 
        'email' => $faker->email, 
        'balance' => $faker->numberBetween(900, 1500),
        'user_id' => $faker->numberBetween(1, 3), 
        'property_id' => $faker->numberBetween(0, 5),

    ];
});
