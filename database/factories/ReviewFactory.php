<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Review>
 */
class ReviewFactory extends Factory
{
    public function definition(): array
    {
        $rating = [1, 2, 3, 4, 5];
        $decimal = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        return [
            'user_id' => User::all('id')->random()->id,
            'rating' => $this->faker->randomElement($rating) . '.' . $this->faker->randomElement($decimal),
            'title' => $this->faker->realText(70),
            'review' => $this->faker->paragraph(),
            'created_at' => $this->faker->dateTimeThisYear()
        ];
    }
}
