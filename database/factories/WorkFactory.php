<?php

namespace Database\Factories;

use App\Models\User;
use App\Work\Domain\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Work>
 */
class WorkFactory extends Factory
{
    public function definition(): array
    {
        $initial_budget = $this->faker->randomNumber(3);
        return [
            'client_id' => User::first()->id,
            'title' => $this->faker->realText(50),
            'location' => $this->faker->address,
            'description' => $this->faker->paragraph(5),
            'skills' => json_encode($this->faker->randomElements(['Mecanica', 'Electrica', 'Plomeria', 'Carpinteria', 'Herreria'], 2)),
            'initial_budget' => $initial_budget,
            'final_budget' => $initial_budget + $this->faker->randomNumber(2),
            'deadline' => $this->faker->date,
            'status' => $this->faker->randomElement(Status::cases()),
            'photo' => '/storage/images/' . $this->faker->image('public/storage/images', 640, 480, null, false),
            'created_at' => $this->faker->dateTime
        ];
    }
}
