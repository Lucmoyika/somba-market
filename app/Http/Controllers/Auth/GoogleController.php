<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToProvider()
    {
        if (empty(config('services.google.client_id')) || empty(config('services.google.client_secret'))) {
            abort(403, 'Google sign-in is not configured.');
        }

        return Socialite::driver('google')->redirect();
    }

    public function handleCallback()
    {
        if (empty(config('services.google.client_id')) || empty(config('services.google.client_secret'))) {
            abort(403, 'Google sign-in is not configured.');
        }

        $googleUser = Socialite::driver('google')->user();

        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName() ?: 'Google User',
                'password' => bcrypt(Str::random(24)),
                'google_id' => $googleUser->getId(),
                'email_verified_at' => now(),
            ]
        );

        if (empty($user->google_id)) {
            $user->update([
                'google_id' => $googleUser->getId(),
                'email_verified_at' => $user->email_verified_at ?? now(),
            ]);
        }

        Auth::login($user, true);

        return redirect()->intended(route('dashboard'));
    }
}
