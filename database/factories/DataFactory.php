<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DataFactory extends Factory
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
            'jumlah_barang' => $this->faker->numberBetween(1, 100),
            'gambar' => $this->faker->name()
        ];
    }
}
