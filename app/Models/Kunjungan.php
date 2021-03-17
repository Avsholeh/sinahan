<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kunjungan extends BaseModel
{
    use HasFactory;

    protected $table = 'kunjungan';

    protected $fillable = [
        'narapidana_id',
        'user_id',
        'berlaku',
        'keperluan',
    ];
}
