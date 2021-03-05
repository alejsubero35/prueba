<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FoodMenu;
use Faker\Generator as Faker;

$factory->define(FoodMenu::class, function (Faker $faker) {
    return [
        'food' => $faker->text(30),
        'description' => $faker->text(150),
        'is_active' => rand(0, 1),
        'food_type_id' => rand(1, 4),
        'hotel_id' => rand(1, 6),
        'available_from' => '08:00:00',
        'available_to'   => '15:00:00',
        'price' => $faker->randomNumber(3),
        'stock' => $faker->randomDigit(200), 
        'photo_food' => $faker->imageUrl($width = 640, $height = 480), // 'http://lorempixel.com/640/480/'),
        'user_created_id'=> rand(1, 3),
        'user_deleted_id'=> rand(1, 3),
        'user_updated_id'=> rand(1, 3),
        
    ];
});
