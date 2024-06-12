<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customers>
 */
class CustomersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'slug'=> $this->faker->unique()->slug,
            'email'=> $this->faker->unique()->email,
            'phone'=> $this->faker->phoneNumber,
            'address'=> $this->faker->address,
            'tier'=> $this->faker->word,

            //
        ];
    }
}
