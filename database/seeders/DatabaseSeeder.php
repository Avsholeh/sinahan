<?php

namespace Database\Seeders;

use App\Models\Biodata;
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
        $admin = \App\Models\User::factory()
            ->count(3)
            ->state(new Sequence(
                [ 'username' => 'admin'],
                [ 'username' => 'staff'],
                [ 'username' => 'user'],
            ))
            ->create();
    }
}
