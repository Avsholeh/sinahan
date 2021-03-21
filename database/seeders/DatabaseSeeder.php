<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

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
                    'roles' => 'TU-PEGAWAI'
                ],
                [
                    'username' => 'masyarakat',
                    'jenis_kelamin' => 'Laki-laki'

                ],
            ))
            ->create();
    }
}
