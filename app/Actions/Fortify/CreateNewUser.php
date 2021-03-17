<?php

namespace App\Actions\Fortify;

use App\Models\Pengguna;
use App\Models\User;
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
            'username' => ['required', 'string', 'max:255', 'min:4', Rule::unique(Pengguna::class),],
            'password' => $this->passwordRules(),
        ])->validate();

        return Pengguna::create([
            'nama_lengkap' => $input['nama_lengkap'],
            'username' => $input['username'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
