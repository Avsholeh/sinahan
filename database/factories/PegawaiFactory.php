<?php

namespace Database\Factories;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\Factory;

class PegawaiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pegawai::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_lengkap' => $this->faker->name,
            'tempat_lahir' => $this->faker->city,
            'nip' => $this->faker->creditCardNumber,
            'pangkat' => $this->faker->numerify('A-##'),
            'golongan' => $this->faker->numerify('B-###'),
            'jabatan' => $this->faker->jobTitle,
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Hindu', 'Budha', 'Konghucu']),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-Laki', 'Perempuan']),
            'pendidikan' => $this->faker->randomElement(['SMA', 'S-I', 'S-II', 'S-III', 'D-II', 'D-III', 'D-IV',]),
        ];
    }
}
