<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $table = 'biodata';
    protected $fillable = [
        'nama_lengkap',
        'user_id',
        'foto',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'pekerjaan_lahir',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
