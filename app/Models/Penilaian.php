<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $table = 'penilaian';

    protected $guarded = [];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(Pengguna::class);
    }
}
