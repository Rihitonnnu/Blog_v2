<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class GoogleLoginController extends Controller
{
    public function getGoogleAuth()
    {
        return Socialite::driver('google')->redirect();
    }

    public function authGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        dd($googleUser);
        $user = User::firstOrCreate(
            ['email' => $googleUser->email],
            [
                'id' => $googleUser->id,
                'name' => $googleUser->name,
                'picture' => $googleUser->picture,
            ]
        );
        Auth::login($user, true);
        return to_route('dashboard');
    }
}
