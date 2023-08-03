<?php


namespace App\Services;


use App\Models\User;
use App\Services\Contracts\Social;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialUser;

class SocialService implements Social
{


    /**
     * @throws \Exception
     */
    public function loginAndRedirectUrl(SocialUser $socialUser): string
    {
        $user = User::query()->where('email', '=', $socialUser->getEmail())->first();

        if (!$user) {
            return route('auth.register');
        }

        $user->name = $socialUser->getName()?:'fff';
        // $user->avatar = $socialUser->getAvatar();
        if ($user->save()) {
            Auth::loginUsingId($user->id);
            return route('account');
        }

        throw new \Exception('Not save user');
    }

}