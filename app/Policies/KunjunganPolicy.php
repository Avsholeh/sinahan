<?php

namespace App\Policies;

use App\Models\Kunjungan;
use App\Models\Pengguna;
use Illuminate\Auth\Access\HandlesAuthorization;

class KunjunganPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return mixed
     */
    public function viewAny(Pengguna $pengguna)
    {
        return $pengguna->roles === $pengguna::ROLES_ADMIN;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @param  \App\Models\Kunjungan  $kunjungan
     * @return mixed
     */
    public function view(Pengguna $pengguna, Kunjungan $kunjungan)
    {
        return $pengguna->roles === $pengguna::ROLES_ADMIN or $pengguna->id === $kunjungan->pengguna_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return mixed
     */
    public function create(Pengguna $pengguna)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @param  \App\Models\Kunjungan  $kunjungan
     * @return mixed
     */
    public function update(Pengguna $pengguna, Kunjungan $kunjungan)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @param  \App\Models\Kunjungan  $kunjungan
     * @return mixed
     */
    public function delete(Pengguna $pengguna, Kunjungan $kunjungan)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @param  \App\Models\Kunjungan  $kunjungan
     * @return mixed
     */
    public function restore(Pengguna $pengguna, Kunjungan $kunjungan)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @param  \App\Models\Kunjungan  $kunjungan
     * @return mixed
     */
    public function forceDelete(Pengguna $pengguna, Kunjungan $kunjungan)
    {
        //
    }
}
