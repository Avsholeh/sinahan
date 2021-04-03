<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Kunjungan
 *
 * @property int $id
 * @property int $narapidana_id
 * @property int $pengguna_id
 * @property string $keperluan
 * @method static \Database\Factories\KunjunganFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Kunjungan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kunjungan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kunjungan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kunjungan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kunjungan whereKeperluan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kunjungan whereNarapidanaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kunjungan wherePenggunaId($value)
 * @mixin \Eloquent
 */
class Kunjungan extends BaseModel
{
    use HasFactory;

    const STS_BLM_VERIFIKASI = 'BELUM DIVERIFIKASI';
    const STS_SDH_VERIFIKASI = 'DITERIMA';

    protected $table = 'kunjungan';

    protected $fillable = [
        'narapidana_id',
        'pengguna_id',
        'keperluan',
    ];

    public function narapidana()
    {
        return $this->belongsTo(Narapidana::class);
    }

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }

    public function dataPengunjung()
    {
        return $this->hasMany(DataPengunjung::class);
    }

    public function waktuKunjungan()
    {
        return $this->hasMany(WaktuKunjungan::class);
    }
}
