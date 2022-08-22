<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MyModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body' => $this->faker->paragraph(3),
            'user_id' => mt_rand(1,10)
        ];
    }
}
