<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Sidang
 *
 * @property int $id
 * @property string $tanggal
 * @property int $hakim_id
 * @property int $jaksa_id
 * @property int $narapidana_id
 * @property string $pasal
 * @property string $jpu
 * @property string $keterangan
 * @method static \Database\Factories\SidangFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Sidang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sidang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sidang query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sidang whereHakimId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sidang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sidang whereJaksaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sidang whereJpu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sidang whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sidang whereNarapidanaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sidang wherePasal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sidang whereTanggal($value)
 * @mixin \Eloquent
 * @property-read mixed $new_tanggal
 * @property-read mixed $tanggal_idn
 * @property-read \App\Models\Hakim|null $hakim
 * @property-read \App\Models\Jaksa|null $jaksa
 * @property-read \App\Models\Narapidana|null $narapidana
 */
class Sidang extends Model
{
    use HasFactory;

    const KET_SAKSI = 'Keterangan Saksi';
    const KET_PUTUSAN = 'Putusan';
    const KET_DAKWAAN = 'Dakwaan';
    const KET_TUNTUTAN = 'Tuntuan';
    const KET_BUKAN_TAHANAN_JAKSA = 'Bukan Tahanan Jaksa';

    protected $table = 'sidang';

    protected $fillable = [
        'tanggal',
        'hakim_id',
        'jaksa_id',
        'narapidana_id',
        'pasal',
//        'jpu',
        'keterangan',
    ];

    public $timestamps = false;

    public function hakim()
    {
        return $this->belongsTo(Hakim::class);
    }

    public function jaksa()
    {
        return $this->belongsTo(Jaksa::class);
    }

    public function narapidana()
    {
        return $this->belongsTo(Narapidana::class);
    }

    public function getNewTanggalAttribute($value)
    {
        return Carbon::parse($this->tanggal)->format('Y-m-d\TH:i:s');
    }

    public function getTanggalIdnAttribute()
    {
        return Carbon::parse($this->attributes['tanggal'])->translatedFormat('l, d F Y');
    }
}
