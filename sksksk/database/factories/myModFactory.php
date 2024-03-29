<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class myModFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'nisn' => $this->faker->unique()->postcode() ,
            'no_telfon' => $this->faker->e164PhoneNumber() 
        ];
    }
}
