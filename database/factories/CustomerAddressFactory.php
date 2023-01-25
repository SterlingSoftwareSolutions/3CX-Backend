<?php

namespace Database\Factories;

use App\Models\CustomerLocation;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => random_int(1,50),
            'customer_location_id' => random_int(1,CustomerLocation::count() -1),
            'address_line_1' => $this->faker->streetAddress()
        ];
    }
}
