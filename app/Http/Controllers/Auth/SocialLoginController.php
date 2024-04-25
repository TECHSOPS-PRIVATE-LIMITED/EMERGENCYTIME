<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();

            $authUser = $this->oauthLogin($user);

            Auth::login($authUser, true);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        if ($user->hasRole('admin') || $user->hasRole('super-admin')) {
            // Redirect to admin dashboard if user is admin or super-admin
            return redirect()->intended('/admin/dashboard');
        } else {
            // Redirect to homepage for other users
            return redirect()->intended('/');
        }    }

    public function oauthLogin($user)
    {
        $user = User::firstOrCreate(
            [
                'name' => $user->name ?: $user->nickname,
                'email' => $user->email,
            ],
            [
                'name' => $user->name ?: $user->nickname,
                'email' => $user->email,
                'password' => Hash::make(md5(uniqid().now())),
                'email_verified_at' => now()
            ]
        );

        try {
            $user->assignRole('user');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return $user;
    }
}
