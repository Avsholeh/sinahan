<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DataPengunjungKunjungan
 *
 * @property int $id
 * @property int $data_pengunjung_id
 * @property int $kunjungan_id
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengunjungKunjungan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengunjungKunjungan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengunjungKunjungan query()
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengunjungKunjungan whereDataPengunjungId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengunjungKunjungan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengunjungKunjungan whereKunjunganId($value)
 * @mixin \Eloquent
 */
class DataPengunjungKunjungan extends Model
{
//    use HasFactory;

    protected $table = 'data_pengunjung_kunjungan';

    public $timestamps = false;

    protected $fillable = [
        'data_pengunjung_id',
        'kunjungan_id',
    ];
}
