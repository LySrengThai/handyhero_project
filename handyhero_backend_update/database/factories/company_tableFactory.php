<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class company_tableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_name' => $this->faker->unique()->company,
            'company_email' => $this->faker->unique()->safeEmail,
            'company_password' => bcrypt($this->faker->password),
            'company_number' => $this->faker->randomNumber(9, true),
            'description' => $this->faker->sentence(20),
            'company_address' => $this->faker->address,
        ];
    }
}
