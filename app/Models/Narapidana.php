<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Narapidana extends BaseModel
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
