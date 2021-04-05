<?php

namespace Database\Factories;

use App\Models\DataPengunjung;
use Illuminate\Database\Eloquent\Factories\Factory;

class DataPengunjungFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DataPengunjung::class;

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
            'tanggal_lahir' => $this->faker->date(),
            'alamat' => $this->faker->address,
            'pekerjaan' => $this->faker->jobTitle,
            'hubungan' => $this->faker->jobTitle,
        ];
    }
}
