<?php

namespace Database\Seeders;

use App\Models\Kunjungan;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $environment = 'dev'; //prod

        // Create Actors

        if ($environment === 'prod') {
            \App\Models\Pengguna::factory()->create([
                'nama_lengkap' => 'Novitasari',
                'username' => 'tupegawai',
                'jenis_kelamin' => 'Wanita',
                'roles' => 'TU-PEGAWAI',
                'foto' => base64_encode(File::get(storage_path('app/public/perempuan.png'))),
            ]);

            \App\Models\Pengguna::factory()->create([
                'username' => 'masyarakat',
                'jenis_kelamin' => 'Pria',
                'foto' => base64_encode(File::get(storage_path('app/public/avatar.png'))),
            ]);
        } else {
            $tuPegawai = \App\Models\Pengguna::factory()->create([
                'nama_lengkap' => 'Novitasari',
                'username' => 'tupegawai',
                'jenis_kelamin' => 'Wanita',
                'roles' => 'TU-PEGAWAI',
                'foto' => base64_encode(File::get(storage_path('app/public/perempuan.png'))),
            ]);

            $user = \App\Models\Pengguna::factory()->create([
                'username' => 'masyarakat',
                'jenis_kelamin' => 'Pria',
                'foto' => base64_encode(File::get(storage_path('app/public/avatar.png'))),
            ]);

            \App\Models\DataPengunjung::factory(1)
                ->for($tuPegawai)
                ->create();

            \App\Models\DataPengunjung::factory(3)
                ->for($user)
                ->create();

            foreach ([1, 2, 3] as $number) {

                $hakim = \App\Models\Hakim::factory()->create();
                $jaksa = \App\Models\Jaksa::factory()->create();
                $narapidana = \App\Models\Narapidana::factory()->create();

                $sidang = \App\Models\Sidang::factory(3)
                    ->for($hakim)
                    ->for($jaksa)
                    ->for($narapidana)
                    ->create();

//                $kunjungan2 = Kunjungan::factory(3)
//                    ->for($narapidana)
//                    ->for($user)
//                    ->create();
            }
        }

    }
}
