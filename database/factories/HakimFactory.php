<?php

namespace Database\Factories;

use App\Models\Hakim;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

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
        $laki = base64_encode(File::get(storage_path('app/public/laki.png')));
        $perempuan = base64_encode(File::get(storage_path('app/public/perempuan.png')));
        return [
            'nama_lengkap' => $this->faker->name,
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date(),
            'nip' => $this->faker->creditCardNumber,
            'pangkat' => $this->faker->jobTitle,
            'golongan' => $this->faker->jobTitle,
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Budha']),
            'jenis_kelamin' => $this->faker->randomElement(['Pria', 'Wanita']),
            'pendidikan' => $this->faker->randomElement(['SMA', 'D II', 'D III', 'D IV', 'S I']),
            'status' => $this->faker->randomElement([Hakim::AKTIF, Hakim::TIDAK_AKTIF]),
            'foto' => $this->faker->randomElement([$laki, $perempuan]),
        ];
    }
}
