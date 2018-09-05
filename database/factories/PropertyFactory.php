<?php

use Faker\Generator as Faker;

$factory->define(App\Property::class, function (Faker $faker) {
    return [
        'address_1' => $faker->streetAddress, 
        'address_2' => $faker->secondaryAddress, 
        'city' => $faker->city, 
        'state' => $faker->state, 
        'zip' => $faker->postcode, 
        'country' => 'United States', 
        'occupied' => $faker->numberBetween(0, 1),
        'lease_length' => $faker->numberBetween(0, 12),
        'rent_amount' => $faker->numberBetween(900, 1500),
        'pet' => $faker->numberBetween(0, 1),
        'tenant_id' => $faker->numberBetween(0, 5),
        'user_id' => $faker->numberBetween(0, 5),
        'maintenance_id' => $faker->numberBetween(0, 15),
        'repair_id' => $faker->numberBetween(0, 15),
    ];
});
