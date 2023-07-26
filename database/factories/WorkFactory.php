<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Work>
 */
class WorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->realText(50),
            'description' => $this->faker->paragraph,
            'location' => $this->faker->address,
            'client_id' => User::first()->id,
            'skills' => $this->faker->randomElement(['Mecanica', 'Electrica', 'Plomeria', 'Carpinteria', 'Herreria']),
            'created_at' => $this->faker->dateTime
        ];
    }
}
