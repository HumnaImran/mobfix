<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'location' => $this->faker->address,
            'phone_no' => $this->faker->numerify('#######'),
            'wa_number' => $this->faker->numerify('#######'),
            'description' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
            'taxPayer_number' => $this->faker->numerify('#####'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
