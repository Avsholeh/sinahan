<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataPengunjung extends BaseModel
{
    use HasFactory;

    protected $table = 'data_pengunjung';

    public $timestamps = false;

    protected $fillable = [
        'kunjungan_id',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'pekerjaan',
        'hubungan',
    ];
}
