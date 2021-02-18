<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Narapidana extends Model
{
    use HasFactory;

    protected $table = 'narapidana';

    protected $fillable = [

        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'kebangsaan',
        'tempat_tinggal',
        'agama',
        'pekerjaan',
        'pendidikan',
        'reg_perkara',
        'reg_tahanan',
        'reg_bukti',
    ];


}
