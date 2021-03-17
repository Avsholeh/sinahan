<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'pengguna';

    public $timestamps = false;

    protected $fillable = [
        'nama_lengkap',
        'username',
        'foto',
        'roles',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
