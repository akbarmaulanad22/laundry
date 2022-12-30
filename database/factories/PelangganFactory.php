<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelanggan>
 */
class PelangganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'outlet_id' => 1,
            'nama' => fake()->name(),
            'alamat' => fake()->words(5, true),
            'telepon' => fake()->numberBetween(),
        ];
    }
}
