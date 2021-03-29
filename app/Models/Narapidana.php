<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Narapidana
 *
 * @property int $id
 * @property string $nama_lengkap
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $jenis_kelamin
 * @property string $kebangsaan
 * @property string $tempat_tinggal
 * @property string $agama
 * @property string $pekerjaan
 * @property string $pendidikan
 * @property string $reg_perkara
 * @property string $reg_tahanan
 * @property string $reg_bukti
 * @property string $kategori
 * @property string $keterangan
 * @property string $status_aktif
 * @method static \Database\Factories\NarapidanaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Narapidana newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Narapidana newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Narapidana query()
 * @method static \Illuminate\Database\Eloquent\Builder|Narapidana whereAgama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Narapidana whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Narapidana whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Narapidana whereKategori($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Narapidana whereKebangsaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Narapidana whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Narapidana whereNamaLengkap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Narapidana wherePekerjaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Narapidana wherePendidikan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Narapidana whereRegBukti($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Narapidana whereRegPerkara($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Narapidana whereRegTahanan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Narapidana whereStatusAktif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Narapidana whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Narapidana whereTempatLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Narapidana whereTempatTinggal($value)
 * @mixin \Eloquent
 */
class Narapidana extends BaseModel
{
    use HasFactory;

    protected $guarded = [];

    const AKTIF = 'Aktif';
    const TIDAK_AKTIF = 'Tidak Aktif';

    protected $table = 'narapidana';

    protected $fillable = [
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'kebangsaan',
        'tempat_tinggal',
        'agama',
        'pekerjaan',
        'pendidikan',
        'reg_perkara',
        'reg_tahanan',
        'reg_bukti',
        'kategori',
        'keterangan',
        'status',
        'foto',
    ];


}
