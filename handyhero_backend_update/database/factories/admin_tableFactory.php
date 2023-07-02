<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class admin_tableFactory extends Factory
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
            'admin_name' => 'admin',
            'admin_password' => bcrypt('123456789'),
            'created_by' => 'admin',
        ];
    }
}
