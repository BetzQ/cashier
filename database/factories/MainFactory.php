<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MainFactory extends Factory
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
            'harga' => $this->faker->numberBetween(500000, 1000000),
            'gambar' => $this->faker->name(),
            'stock' => $this->faker->numberBetween(10, 100),
        ];
    }
}
