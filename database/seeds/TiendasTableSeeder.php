<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiendasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tiendas = array(
            array(
                'id' => 1,
                'name' => 'Tienda 1',
                'address' => 'Ciudad de Panama',
                'telephone' => '02124569874', 
                'email' => 'tienda_1@gmail.com',
                'location_in_map' => 'Lat:10.4937589840847,Long:-66.1071181297302', 
                'image' => 'image_1.png',
                'is_Active' => 0, ),
            array(
                'id' => 2,
                'name' => 'Tienda 2',
                'address' => 'Ciudad de Panama',
                'telephone' => '02124569874', 
                'email' => 'tienda_2@gmail.com',
                'location_in_map' => 'Lat:10.4937589840847,Long:-66.1071181297302', 
                'image' => 'image_2.png',
                'is_Active' => 1, ),
            array(
                'id' => 3,
                'name' => 'Tienda 3',
                'address' => 'Ciudad de Panama',
                'telephone' => '02124569874', 
                'email' => 'tienda_3@gmail.com',
                'location_in_map' => 'Lat:10.4937589840847,Long:-66.1071181297302', 
                'image' => 'image_3.png',
                'is_Active' => 1, ),
       
        );
        DB::table('tiendas')->insert($tiendas);
    }
}
