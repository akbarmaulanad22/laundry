<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 2,
            'outlet_id' => 1,
            'pelanggan_id' => fake()->numberBetween(1, 100),
            'kode' => fake()->numerify('c-#####'),
            'status' => fake()->randomElement(['Dibayar', 'Belum dibayar'])
        ];
    }
}
