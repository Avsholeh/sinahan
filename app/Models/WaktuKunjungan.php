<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\WaktuKunjungan
 *
 * @property int $id
 * @property int $kunjungan_id
 * @property string $tanggal
 * @property string $dari_jam
 * @property string $hingga_jam
 * @method static \Database\Factories\WaktuKunjunganFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|WaktuKunjungan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WaktuKunjungan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WaktuKunjungan query()
 * @method static \Illuminate\Database\Eloquent\Builder|WaktuKunjungan whereDariJam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WaktuKunjungan whereHinggaJam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WaktuKunjungan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WaktuKunjungan whereKunjunganId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WaktuKunjungan whereTanggal($value)
 * @mixin \Eloquent
 */
class WaktuKunjungan extends Model
{
    use HasFactory;

    protected $table = 'waktu_kunjungan';

    public $timestamps = false;

    protected $fillable = [
        'kunjungan_id', 'tanggal', 'dari_jam', 'hingga_jam'
    ];

    public function kunjungan()
    {
        return $this->belongsTo(WaktuKunjungan::class);
    }

    public function getTanggalAttribute()
    {
        return Carbon::parse($this->attributes['tanggal'])->translatedFormat('l, d F Y');
    }
}
