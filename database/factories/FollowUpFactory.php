<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FollowUpFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'time' => $this->faker->dateTime(),
            'inquiry_id' => $this->faker->numberBetween(1, 100),
            'customer_id' => $this->faker->numberBetween(1, 50),
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
