<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

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
 */
class Sidang extends BaseModel
{
    use HasFactory;

    protected $table = 'sidang';

    protected $fillable = [
        'hakim_id',
        'narapidana_id',
        'tanggal',
        'pasal',
        'jpu',
        'keterangan',
    ];
}
