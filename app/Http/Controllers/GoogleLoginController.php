<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Service\baseConfig;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function redirect() {
        $parameters = ['access_type' => 'offline', "prompt" => "consent select_account"];
        return Socialite::driver('google')
            ->scopes(['https://www.googleapis.com/auth/drive', 'https://www.googleapis.com/auth/forms'])
            ->with($parameters)// refresh token
            ->redirect();
    }

    public function callback(Request $request) {
        $userInfo = Socialite::driver('google')->user();
        $userId = $userInfo->getId();
        $userEmail = $userInfo->getEmail();
        $userName = $userInfo->getName();
        $userNickname = $userInfo->getNickname();

        $findUser = User::where('google_id', $userId)->first();

        if($findUser){
            Auth::login($findUser);
            return redirect('/index');
        }
        else{
//            dd($userId);
            $createUser = User::create([
               'name' => $userName,
               'email' => $userEmail,
                'nickname' => $userNickname,
                'google_id' => $userId,
                'password' => bcrypt(baseConfig::defaultPassword)
            ]);

            Auth::login($createUser);

            return redirect('/');
        }

    }

}
