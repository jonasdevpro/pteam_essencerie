<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        $faker = Faker::create();

        // Générez un nombre aléatoire d'utilisateurs
        $userCount = 10;

        for ($i = 0; $i < $userCount; $i++) {
            DB::table('users')->insert([
                'id' => Str::uuid(),
                'nom' => $faker->lastName,
                'prenom' => $faker->firstName,
                'tel' => $faker->phoneNumber,
                'active' => $faker->boolean,
                'role' => 'pompiste',
                'password' => Hash::make('1234'),
                'remember_token' => Str::random(10),
                'user_id' => 1,
            ]);
        }
    }
}

