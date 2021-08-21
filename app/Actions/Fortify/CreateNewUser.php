<?php

namespace App\Actions\Fortify;

use App\Models\Pengguna;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return \App\Models\Pengguna
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'nama_lengkap' => ['required', 'string'],
            'email' => ['required', 'string'],
            'jenis_kelamin' => ['required', 'string'],
            'username' => ['required', 'string', 'max:255', 'min:4', Rule::unique(Pengguna::class)],
            'password' => $this->passwordRules(),
        ])->validate();

        return Pengguna::create([
            'nama_lengkap' => $input['nama_lengkap'],
            'email' => $input['email'],
            'jenis_kelamin' => $input['jenis_kelamin'],
            'username' => $input['username'],
            'foto' => $this->generateFoto($input['jenis_kelamin']),
            'password' => Hash::make($input['password']),
        ]);
    }

    private function generateFoto($jenisKelamin)
    {
        if ($jenisKelamin === 'Pria') {
            return base64_encode(File::get(storage_path('app/public/laki.png')));
        } else {
            return base64_encode(File::get(storage_path('app/public/perempuan.png')));
        }
    }
}
