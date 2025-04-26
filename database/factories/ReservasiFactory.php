<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class ReservasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_pelanggan' => $this->faker->name(),
            'nomor_meja' => $this->faker->numberBetween(1, 20), // Asumsi nomor meja 1-20
            'jumlah_orang' => $this->faker->numberBetween(1, 10), // Asumsi 1-10 orang per reservasi
            'tanggal_reservasi' => $this->faker->date(),
            'waktu_reservasi' => $this->faker->time(),
            'catatan_khusus' => $this->faker->sentence(6), // Kalimat random 6 kata
            'status' => $this->faker->randomElement(['terjadwal', 'hadir', 'dibatalkan']),
        ];
    }
    
}