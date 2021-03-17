<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

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
