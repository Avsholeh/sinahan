<?php

namespace Database\Seeders;

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
        // Create Actors
        $admin = \App\Models\Pengguna::factory()
            ->count(2)
            ->state(new Sequence(
                [
                    'nama_lengkap' => 'Novitasari',
                    'username' => 'tupegawai',
                    'jenis_kelamin' => 'Wanita',
                    'roles' => 'TU-PEGAWAI',
                    'foto' => base64_encode(File::get(storage_path('app/public/perempuan.png'))),
                ],
                [
                    'username' => 'masyarakat',
                    'jenis_kelamin' => 'Pria',
                    'foto' => base64_encode(File::get(storage_path('app/public/avatar.png'))),
                ],
            ))
            ->create();

        foreach ([1,2,3,4,5] as $number) {

            $hakim = \App\Models\Hakim::factory()->create();
            $jaksa = \App\Models\Jaksa::factory()->create();
            $narapidana = \App\Models\Narapidana::factory()->create();

            $sidang = \App\Models\Sidang::factory(3)
                ->for($hakim)
                ->for($jaksa)
                ->for($narapidana)
                ->create();

        }
    }
}
