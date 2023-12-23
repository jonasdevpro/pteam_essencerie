<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->word,
            'prix' => fake()->numberBetween(100, 10000),
            'quantite' => fake()->numberBetween(20, 100),
            'stock_alert' =>fake()->numberBetween(5, 10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
