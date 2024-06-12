<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bookings>
 */
class BookingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_name' => $this->faker->name,
            'slug'=> $this->faker->unique()->slug,
            'customer_phone'=> $this->faker->phoneNumber,
            'address'=> $this->faker->address,
            'employee_id'=> $this->faker->randomDigit,
            'time'=> $this->faker->time,
        ];
    }
}
