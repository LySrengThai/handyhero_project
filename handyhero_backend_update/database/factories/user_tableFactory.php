<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class user_tableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_fname' => $this->faker->firstName,
            'user_lname' => $this->faker->lastName,
            'user_email' => $this->faker->unique()->safeEmail,
            'user_password' => bcrypt($this->faker->password),
            'user_gender' => $this->faker->randomElement(['Male', 'Female']),
            'user_number' => $this->faker->randomNumber(9, true),
            'user_address' => $this->faker->address,
        ];
    }
}
