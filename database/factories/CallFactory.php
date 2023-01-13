<?php

namespace Database\Factories;

use App\Models\Inquiry;
use Illuminate\Database\Eloquent\Factories\Factory;

class CallFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $inquiry_id = $this->faker->numberBetween(1, 100);
        return [
            'time' => $this->faker->dateTime(),
            'status_remark' => Inquiry::find($inquiry_id)->status_remark,
            'inquiry_id' => $inquiry_id,
            'customer_id' => $this->faker->numberBetween(1, 50),
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
