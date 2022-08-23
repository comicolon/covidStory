<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return User|\Illuminate\Http\RedirectResponse
     */
    public function create(array $input)
    {
          $validator = Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nickname' =>['required', 'string', 'max:32', 'unique:users',],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ],
        [
            'name.required' => '이름을 입력하세요',
            'email.unique' => '중복된 이메일 입니다.',
            'nickname.unique' => '중복된 닉네임 입니다.',
        ]);

//        if ($validator->fails()) {
//            return redirect()->back()->withErrors($validator)->withInput();
//        }

        $validator->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'nickname' => $input['nickname'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
