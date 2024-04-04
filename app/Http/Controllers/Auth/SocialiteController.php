<?php

namespace App\Http\Controllers\Auth;


use App\Enums\ProviderType;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;


class SocialiteController extends Controller
{
    public function googleLogin()
    {
        return Socialite::driver(ProviderType::GOOGLE)->redirect();
    }

    public function googleCallBack()
    {
        try {
            $user = Socialite::driver(ProviderType::GOOGLE)->user();
            $is_user = User::where('email', $user->getEmail())->first();
            if (!$is_user) {
                $new_user = User::create([
                    'google_id' => $user->getId(),
                    'first_name' => $user->getName(),
                    'last_name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'subscribe' => 0,
                    'password' => Hash::make($user->getEmail()),
                ]);
            } else {
                User::where('email', $user->getEmail())->update(['google_id' => $user->getId(),]);
                $new_user = User::where('email', $user->getEmail())->first();
            }
            Auth::login($new_user);
            return redirect()->route('frontend.dashboard');
        } catch (Exception $e) {
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back();
        }
    }
}
