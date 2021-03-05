<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert(
            [
                'first_name' => 'Alejandro Rafael',
                'last_name' => 'Subero Rodriguez',
                'email' => 'juandiego1410@gmail.com',
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
                'telephone' => '02121145698',
                'nationality' => 'V',
                'identity_document' => 'cedula',
                'civil_status' => 'Casado',
                'home_address'=> 'San Francisco de Yare, sector Qda Seca, calle Miranda, Casa s/n - Estado Miranda ',
                'user_creator_id'=> 1,
                'user_deleted_id'=> 1,
                'user_updated_id'=> 1,
                'role_id'=> 1,
                'country_id'=> 2,
                'created_at' => '2020-08-21 05:30:55',
                'updated_at' => '2020-08-21 05:30:55',
            ]
        );

        factory(User::class, 1)->create();
    }
}
