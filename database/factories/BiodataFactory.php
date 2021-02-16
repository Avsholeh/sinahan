<?php

namespace Database\Factories;

use App\Models\Biodata;
use Illuminate\Database\Eloquent\Factories\Factory;

class BiodataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Biodata::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $foto = file_get_contents('public/img/pria.png');

        return [
            'user_id' => $this->faker->numberBetween(1, 3),
            'nama_lengkap' => $this->faker->name,
            'foto' => $foto,
            'alamat' => $this->faker->address,
            'tempat_lahir' => $this->faker->country,
            'tanggal_lahir' => $this->faker->date(),
            'pekerjaan' => $this->faker->jobTitle,
        ];
    }
}
