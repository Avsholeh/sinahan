<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DataPengunjung
 *
 * @property int $id
 * @property int $kunjungan_id
 * @property string $nama_lengkap
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $alamat
 * @property string $pekerjaan
 * @property string $hubungan
 * @method static \Database\Factories\DataPengunjungFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengunjung newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengunjung newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengunjung query()
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengunjung whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengunjung whereHubungan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengunjung whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengunjung whereKunjunganId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengunjung whereNamaLengkap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengunjung wherePekerjaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengunjung whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengunjung whereTempatLahir($value)
 * @mixin \Eloquent
 * @property int $pengguna_id
 * @property-read \App\Models\Pengguna $pengguna
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengunjung wherePenggunaId($value)
 */
class DataPengunjung extends Model
{
    use HasFactory;

    protected $table = 'data_pengunjung';

    public $timestamps = false;

    protected $fillable = [
        'pengguna_id',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'pekerjaan',
        'hubungan',
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }
}
