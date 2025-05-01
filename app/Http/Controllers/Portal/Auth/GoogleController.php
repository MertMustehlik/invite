<?php

namespace App\Http\Controllers\Portal\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();


        $user = User::updateOrCreate([
            'google_id' => $googleUser->id,
        ], [
            'first_name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            //'google_token' => $googleUser->token,
            //'google_refresh_token' => $googleUser->refreshToken,
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }
}
