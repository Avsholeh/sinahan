<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\Pengguna
 *
 * @property int $id
 * @property string $nama_lengkap
 * @property string $username
 * @property string $password
 * @property string $jenis_kelamin
 * @property string $roles
 * @property mixed|null $foto
 * @property string|null $remember_token
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\PenggunaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengguna newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengguna newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengguna query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengguna whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengguna whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengguna whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengguna whereNamaLengkap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengguna wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengguna whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengguna whereRoles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengguna whereUsername($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DataPengunjung[] $dataPengunjung
 * @property-read int|null $data_pengunjung_count
 */
class Pengguna extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    const ROLES_ADMIN = 'TU-PEGAWAI';
    const ROLES_USER = 'MASYARAKAT';

    protected $table = 'pengguna';

    public $timestamps = false;

    protected $fillable = [
        'nama_lengkap',
        'username',
        'jenis_kelamin',
        'password',
        'roles',
        'foto',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function dataPengunjung()
    {
        return $this->hasMany(DataPengunjung::class);
    }

    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class);
    }

}
