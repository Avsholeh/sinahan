<?php

namespace Database\Factories;

use App\Models\Narapidana;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

class NarapidanaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Narapidana::class;

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
            'jenis_kelamin' => $this->faker->randomElement(['Pria', 'Wanita']),
            'kebangsaan' => $this->faker->country,
            'tempat_tinggal' => $this->faker->address,
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Budha']),
            'pekerjaan' => $this->faker->word,
            'pendidikan' => $this->faker->randomElement(['SMA', 'D II', 'D III', 'D IV', 'S I']),
            'reg_perkara' => "PDM–{$this->faker->randomNumber()}/TBK/E.3.2/01/2020",
            'reg_tahanan' => "T–{$this->faker->randomNumber()}/TBK/E.3.2/01/2020",
            'reg_bukti' => "B–{$this->faker->randomNumber()}/TBK/E.3.2/01/2020",
//            'kategori' => $this->faker->domainName,
            'keterangan' => $this->faker->randomElement([
                Narapidana::KET_SAKSI,
                Narapidana::KET_PUTUSAN,
                Narapidana::KET_DAKWAAN,
                Narapidana::KET_TUNTUTAN,
                Narapidana::KET_BUKAN_TAHANAN_JAKSA,
            ]),
            'status' => $this->faker->randomElement([Narapidana::AKTIF, Narapidana::TIDAK_AKTIF]),
            'foto' => $this->faker->randomElement([$laki, $perempuan]),
        ];
    }
}
