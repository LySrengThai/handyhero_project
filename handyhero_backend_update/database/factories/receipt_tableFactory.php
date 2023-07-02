<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class receipt_tableFactory extends Factory
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
            'receipt_date' => $this->faker->dateTimeBetween('2000-01-01', '2023-12-31')->format('Y-m-d'),
            'receipt_price' => $this->faker->numberBetween(10000, 100000),
            'booking_id' => $this->faker->numberBetween(1, \App\Models\book_table::count()),
        ];
    }
}
