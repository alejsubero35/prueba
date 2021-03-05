<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\Role;
use App\Models\Country;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        //'email_verified_at' => now(),
        'password' => Hash::make('12345678'),
        'remember_token' => Str::random(10),
        'telephone' => $faker->phoneNumber,
        'nationality' => $faker->randomElement(['V', 'E']),
        'identity_document' => $faker->phoneNumber,
        'civil_status' => $faker->randomElement(['Soltero', 'Casado','Divorciado','Viudo']),
        //'date_birth'=> $faker->dateTimeThisCentury->format('Y-m-d'),
        'home_address'=> $faker->address,
        //'zip_code'=> $faker->postcode,
        'user_creator_id'=> 1,
        'user_deleted_id'=> 1,
        'user_updated_id'=> 1,
        'role_id'=> 1,
        'country_id'=> 2,
        //'verified'=> $verificado = $faker->randomElement([User::USUARIO_VERIFICADO, User::USUARIO_NO_VERIFICADO ]),
        //'verification_token'=> $verificado == User::USUARIO_VERIFICADO ? null : User::generarVerificationToken(),
        //'admin'=> $faker->randomElement([User::USUARIO_ADMINISTRADOR, User::USUARIO_REGULAR ]),
    ];
});
