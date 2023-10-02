<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function login()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {

        $user = Socialite::driver('google')->user();

        // Check if the user already exists in the database.
        $existingUser = User::where('google_id', $user->id)->first();
        // If the user does not exist, create a new user account.
        if (!$existingUser) {
            $existingUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
            ]);
        }
        // Log the user in.
        auth()->login($existingUser);

        // Redirect the user to their home page.
        return redirect('/');
    }
}
