<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class service_tableFactory extends Factory
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
            'service_name' => $this->faker->jobTitle,
            'service_description' => $this->faker->sentence(100),
            'service_price' => $this->faker->numberBetween(1000, 10000),
            'cate_id' => $this->faker->numberBetween(1, \App\Models\cate_table::count()),
            'company_id' => $this->faker->numberBetween(1, \App\Models\company_table::count()),
        ];
    }
}
