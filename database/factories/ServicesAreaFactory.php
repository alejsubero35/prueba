<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ServiceArea;
use Faker\Generator as Faker;

$factory->define(Room::class, function (Faker $faker) {
    return [
        'area' => $faker->text(150),
        'hotel_id' => rand(1, 6),
    ];
});
