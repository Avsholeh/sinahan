<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPengunjung extends Model
{
    use HasFactory;

    protected $table = 'data_pengunjung';

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
