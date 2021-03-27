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
                    'jenis_kelamin' => 'Perempuan',
                    'roles' => 'TU-PEGAWAI',
                    'foto' => base64_encode(File::get(storage_path('app/public/perempuan.png'))),
                ],
                [
                    'username' => 'masyarakat',
                    'jenis_kelamin' => 'Laki-laki',
                    'foto' => base64_encode(File::get(storage_path('app/public/avatar.png'))),
                ],
            ))
            ->create();

//        $hakims = \App\Models\Hakim::factory(50)->create();
    }
}
