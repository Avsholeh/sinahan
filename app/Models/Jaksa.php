<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Jaksa
 *
 * @property int $id
 * @property string $nama_lengkap
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string|null $nip
 * @property string|null $pangkat
 * @property string|null $golongan
 * @property string $jabatan
 * @property string $agama
 * @property string $jenis_kelamin
 * @property string|null $pendidikan
 * @property string $status
 * @property string|null $foto
 * @method static \Database\Factories\JaksaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Jaksa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jaksa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jaksa query()
 * @method static \Illuminate\Database\Eloquent\Builder|Jaksa whereAgama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jaksa whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jaksa whereGolongan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jaksa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jaksa whereJabatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jaksa whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jaksa whereNamaLengkap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jaksa whereNip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jaksa wherePangkat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jaksa wherePendidikan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jaksa whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jaksa whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jaksa whereTempatLahir($value)
 * @mixin \Eloquent
 */
class Jaksa extends BaseModel
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'jaksa';

    const AKTIF = 'Aktif';
    const TIDAK_AKTIF = 'Tidak Aktif';

    protected $fillable = [
        'nama_lengkap',
        'nip',
        'tempat_lahir',
        'tanggal_lahir',
        'pangkat',
        'golongan',
        'jabatan',
        'agama',
        'jenis_kelamin',
        'pendidikan',
        'status',
        'foto',
    ];
}
