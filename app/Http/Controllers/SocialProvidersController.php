<?php

namespace App\Http\Controllers;

use App\Services\Contracts\Social;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;

class SocialProvidersController extends Controller
{
    public function redirect(string $driver): RedirectResponse|SymfonyRedirectResponse
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback(string $driver, Social $social): mixed
    {

        return redirect(
            $social->loginAndRedirectUrl(Socialite::driver($driver)->user())
        );
    }
}
