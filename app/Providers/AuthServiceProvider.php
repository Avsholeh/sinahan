<?php

namespace App\Providers;

use App\Models\DataPengunjung;
use App\Models\Kunjungan;
use App\Policies\DataPengunjungPolicy;
use App\Policies\KunjunganPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         Kunjungan::class => KunjunganPolicy::class,
         DataPengunjung::class => DataPengunjungPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

    }
}
