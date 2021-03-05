<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Room;
use Faker\Generator as Faker;

$factory->define(Room::class, function (Faker $faker) {
    return [
        'num_room' => rand(1, 50),
        'description' => $faker->text(150),
        'is_active' => rand(0, 1),
        'type_room_id' => rand(1, 3),
        'hotel_id' => rand(1, 6),
        'user_created_id'=> rand(1, 3),
        'user_deleted_id'=> rand(1, 3),
        'user_updated_id'=> rand(1, 3),
        
    ];
});
