<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = [
            [
               'name'=>'Septian Mukti Pratama',
               'username'=>'septianadmin',
               'email'=>'septyan_mukty@rocketmail.com',
               'kontak'=>'081230533365',
               'alamat'=>'Desa Kanung Kabupaten Madiun',
               'role'=>'1',
               'password'=> bcrypt('15septian'),
            ],
            [
               'name'=>'Admin Pasar',
               'username'=>'adminpasar',
               'email'=>'diskominfo@madiunkab.go.id',
               'kontak'=>'081123456789',
               'alamat'=>'Alamat Admin',
               'role'=>'1',
               'password'=> bcrypt('pasardwpadmin'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
