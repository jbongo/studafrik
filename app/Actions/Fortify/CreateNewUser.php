<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Validation\Rule;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {


        // dd($input);
       
    //    if( !in_array($input['role'], ['candidat','recruteur']) ){
    //       dd('La valeur du type ne doit être modifiée');
    //    }
        Validator::make($input, [
            'role' => ['required', 'string',Rule::in(['candidat','recruteur']), 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'role' => $input['role'],
            'email' => $input['email'],
            'accept_newsletter' => array_key_exists('accept_newsletter', $input),
            'password' => Hash::make($input['password']),
        ]);
    }
}
