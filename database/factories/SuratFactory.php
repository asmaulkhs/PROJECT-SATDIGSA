<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Surat>
 */
class SuratFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tujuan = ['Akademik', 'Mahasiswa', 'Kerjasama', 'Kepegawaian'];
        return [
            'no_surat'=> $this->faker->randomNumber(5,true),
            'instansi'=> $this->faker->regexify('[A-Z]{5}[0-4]{3}'),
            'pengirim'=> $this->faker->name(),
            'pengunjung'=> mt_rand(5,30),
            'tujuan_id'=> mt_rand(1,4),
            'waktu'=> $this->faker->dateTimeBetween('-10 months', '+2 months'),
            'user_id'=>5,
            'status_id'=>2,
        ];
    }
}
