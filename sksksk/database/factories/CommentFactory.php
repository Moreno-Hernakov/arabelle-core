<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $i = 1;
        return [
            'body' => $this->faker->paragraph(),
            'user_id' => mt_rand(1,10),
            'post_id' => $i++,
        ];
    }
}
