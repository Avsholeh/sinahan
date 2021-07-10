<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
 * @property string|null $no_surat
 * @property string $dibuat_pada
 * @property string $status
 * @property-read \App\Models\Narapidana|null $narapidana
 * @property-read \App\Models\Pengguna|null $pengguna
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\WaktuKunjungan[] $waktuKunjungan
 * @property-read int|null $waktu_kunjungan_count
 * @method static \Illuminate\Database\Eloquent\Builder|Kunjungan whereDibuatPada($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kunjungan whereNoSurat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kunjungan whereStatus($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DataPengunjungKunjungan[] $dataPengunjungKunjungan
 * @property-read int|null $data_pengunjung_kunjungan_count
 * @property-read mixed $dibuat_pada_bulan_tahun
 */
class Kunjungan extends Model
{
    use HasFactory;

    const STS_BLM_VERIFIKASI = 'BELUM DIVERIFIKASI';
    const STS_SDH_VERIFIKASI = 'DITERIMA';

    protected $table = 'kunjungan';

    protected $fillable = [
        'narapidana_id',
        'pengguna_id',
        'keperluan',
        'no_surat',
        'dibuat_pada',
    ];

    public $timestamps = false;

    public function narapidana()
    {
        return $this->belongsTo(Narapidana::class);
    }

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }

    public function waktuKunjungan()
    {
        return $this->hasMany(WaktuKunjungan::class);
    }

    public function getDibuatPadaAttribute()
    {
        return Carbon::parse($this->attributes['dibuat_pada'])->translatedFormat('l, d F Y');
    }

    public function getDibuatPadaBulanTahunAttribute()
    {
        return Carbon::parse($this->attributes['dibuat_pada'])->translatedFormat('F Y');
    }

    public function dataPengunjungKunjungan()
    {
        return $this->hasMany( DataPengunjungKunjungan::class);
    }
}
