<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DormRoom;
use Faker\Generator as Faker;

$factory->define(DormRoom::class, function (Faker $faker) {
    return [
        'address' => $faker->address,
        'numberOfRooms' =>$faker->randomDigitNotNull,
        'numberOfBathrooms' =>$faker->randomDigitNotNull,
        'numberOfResidents' => $faker->randomDigitNotNull,
        'size' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000.0),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000.0),
        'allowsAnimals' => $faker->boolean,
    ];
});
