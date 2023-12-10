<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'nom' => $this->faker->firstName,
            'prenom' => $this->faker->lastName,
            'tel' => $this->faker->unique()->randomNumber(8),
            'active' => $this->faker->boolean,
            'role' => $this->faker->randomElement(['gerant', 'chef_piste', 'pompiste']),
            'password' => bcrypt('password'), // Modifiez cela en fonction de votre configuration d'authentification
            'remember_token' => Str::random(10),
            'user_id' => null, // Modifiez si nécessaire en fonction de vos relations
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
