<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cucian>
 */
class CucianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'transaksi_id' => fake()->numberBetween(1, 100),
            'outlet_id' => 1,
            'pelanggan_id' => fake()->numberBetween(1, 100),
            'nama' =>  fake()->words(3, true),
            'jenis' =>  fake()->randomElement(['Kiloan', 'Selimut', 'Bed cover', 'Kaos', 'Lainnya']),
            'harga' => fake()->randomNumber(5, true)
        ];
    }
}
