<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nim' => fake()->randomNumber(8, true),
            'nama' => fake('id_ID')->name(),
            'prodi' => 'Informatika',
            'angkatan' => rand(2017, 2022),
            'alamat' => fake('id_ID')->address()
        ];
    }
}
