<?php

namespace App\Policies;

use App\Models\DataPengunjung;
use App\Models\Pengguna;
use Illuminate\Auth\Access\HandlesAuthorization;

class DataPengunjungPolicy
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
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @param  \App\Models\DataPengunjung  $dataPengunjung
     * @return mixed
     */
    public function view(Pengguna $pengguna, DataPengunjung $dataPengunjung)
    {
        return $pengguna->roles === $pengguna::ROLES_ADMIN or $pengguna->id === $dataPengunjung->pengguna_id;
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
     * @param  \App\Models\DataPengunjung  $dataPengunjung
     * @return mixed
     */
    public function update(Pengguna $pengguna, DataPengunjung $dataPengunjung)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @param  \App\Models\DataPengunjung  $dataPengunjung
     * @return mixed
     */
    public function delete(Pengguna $pengguna, DataPengunjung $dataPengunjung)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @param  \App\Models\DataPengunjung  $dataPengunjung
     * @return mixed
     */
    public function restore(Pengguna $pengguna, DataPengunjung $dataPengunjung)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @param  \App\Models\DataPengunjung  $dataPengunjung
     * @return mixed
     */
    public function forceDelete(Pengguna $pengguna, DataPengunjung $dataPengunjung)
    {
        //
    }
}
