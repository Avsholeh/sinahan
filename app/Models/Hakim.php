<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Hakim
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
 * @method static \Database\Factories\HakimFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Hakim newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hakim newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hakim query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hakim whereAgama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hakim whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hakim whereGolongan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hakim whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hakim whereJabatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hakim whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hakim whereNamaLengkap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hakim whereNip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hakim wherePangkat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hakim wherePendidikan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hakim whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hakim whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hakim whereTempatLahir($value)
 * @mixin \Eloquent
 */
class Hakim extends BaseModel
{
    use HasFactory;

    protected $table = 'hakim';
}
