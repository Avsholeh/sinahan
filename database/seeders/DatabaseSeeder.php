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
        $admin = \App\Models\User::factory(1)
            ->state(new Sequence(
                [ 'username' => 'sinahan_admin'],
                [ 'username' => 'sinahan_staff'],
                [ 'username' => 'sinahan_user'],
            ))
            ->create();

    }
}
