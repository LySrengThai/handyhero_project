<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class book_tableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'book_date' => $this->faker->dateTimeBetween('2000-01-01', '2023-12-31')->format('Y-m-d'),
            'booking_date' => $this->faker->dateTimeBetween('2000-01-01', '2023-12-31')->format('Y-m-d'),
            'status' => $this->faker->numberBetween(0, 2),
            'user_id' => $this->faker->numberBetween(1, \App\Models\user_table::count()),
            'service_id' => $this->faker->numberBetween(1, \App\Models\service_table::count()),
        ];
    }
}
