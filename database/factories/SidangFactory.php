<?php

namespace Database\Factories;

use App\Models\Sidang;
use Illuminate\Database\Eloquent\Factories\Factory;

class SidangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sidang::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tanggal' => $this->faker->dateTime(),
//            'hakim_id',
//            'jaksa_id',
//            'narapidana_id',
            'pasal' => "Pasal {$this->faker->randomNumber(3)} KUHP",
//            'jpu',
            'keterangan' => $this->faker->randomElement([
                Sidang::KET_SAKSI,
                Sidang::KET_BUKAN_TAHANAN_JAKSA,
                Sidang::KET_DAKWAAN,
                Sidang::KET_PUTUSAN,
                Sidang::KET_TUNTUTAN,
            ]),
        ];
    }
}
