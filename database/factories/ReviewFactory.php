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
        $rating = [1, 2, 3, 4];
        $decimal = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $randomId = User::all('id')->random()->id;
        return [
            'from_user_id' => $randomId,
            'to_user_id' => User::where('id', '!=', $randomId)->get()->random()->id,
            'rating' => $this->faker->randomElement($rating) . '.' . $this->faker->randomElement($decimal),
            'title' => $this->faker->realText(70),
            'review' => $this->faker->paragraph(),
            'created_at' => $this->faker->dateTimeThisYear()
        ];
    }
}
