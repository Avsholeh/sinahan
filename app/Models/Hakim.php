<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hakim extends Model
{
    use HasFactory;

    protected $table = 'hakim';

    public function biodata()
    {
        return $this->hasOne(Biodata::class);
    }
}
