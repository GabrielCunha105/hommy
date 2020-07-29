<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DormRoom;
use Faker\Generator as Faker;

$factory->define(DormRoom::class, function (Faker $faker) {
    return [
        'address' => $faker->address,
        'numberOfRooms' =>3,
        'numberOfBathrooms' =>2,
        'numberOfResidents' => 5,
        'size' => 123.45,
        'price' => 789.10,
        'allowsAnimals' => $faker->boolean,
    ];
});
