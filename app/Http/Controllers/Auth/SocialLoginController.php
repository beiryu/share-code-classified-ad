<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;

class SocialLoginController extends Controller
{
    //
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function processLoginGoogle()
    {
        $googleUser = Socialite::driver('google')->user();
       
        if (!$googleUser)
        {
            return response()->redirect('/login');
        }

        $systemUser = User::where('google_id', $googleUser->id)-> first();
        if (!$systemUser)
        {
            $systemUser = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
            ]);
        }
        Auth::login($systemUser);
        return redirect('/');
    }
}
