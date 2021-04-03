<?php

namespace Database\Factories;

use App\Models\Kunjungan;
use Illuminate\Database\Eloquent\Factories\Factory;

class KunjunganFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kunjungan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'narapidana_id' => $this->faker->randomNumber(1),
            'pengguna_id' => $this->faker->randomElement([1, 2]),
            'keperluan' => $this->faker->paragraph,
        ];
    }
}
