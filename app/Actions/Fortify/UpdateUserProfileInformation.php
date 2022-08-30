<?php

namespace App\Actions\Fortify;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        $originNickname = $user->nickname;

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'nickname' => ['required', 'string', 'max:32', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        // 별명 교체 시에 기록을 남긴다
        $changeNickname = $input['nickname'];
        if ($originNickname != $changeNickname){

            $nowDatetime = Carbon::now('Asia/Seoul');
//            $now_timestamp = $nowDatetime->getTimestamp();
            $now_datetime = $nowDatetime->format('Y-m-d h:i:s');

            $user->change_nick_date = $now_datetime;
            $user->update([
                'change_nick_date' => $user->change_nick_date,
            ]);

        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'nickname' => $input['nickname'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
            'nickname' => $input['nickname'],
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
