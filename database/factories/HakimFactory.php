<?php

namespace Database\Factories;

use App\Models\Hakim;
use Illuminate\Database\Eloquent\Factories\Factory;

class HakimFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hakim::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pegawai_id' => $this->faker->numberBetween(1, 3)
        ];
    }
}
