<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = [
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'nip',
        'pangkat',
        'golongan',
        'jabatan',
        'peran',
        'agama',
        'jenis_kelamin',
        'pendidikan',
        'foto',
    ];
}
