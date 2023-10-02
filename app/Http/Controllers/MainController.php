<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Mail\ForgetPasswordMail;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password as PasswordRules;

class MainController extends Controller
{
    use HttpResponses;
    public function login(LoginFormRequest $request)
    {
        $request->validated($request->all());
        $credentials = $request->only($request->email, $request->passwword);
        if (!Auth::attempt($credentials)) {
            return $this->error("", "Invalid Email Or Password");
        }
        $user = User::where("email", $request->email)->first();

        return $this->success([
            "user" => $user,
            "token" => $user->createToken("Token of : " . $user->name)->plainTextToken,
        ]);
    }
    public function register(RegisterFormRequest $request)
    {
        $request->validated($request->all());
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return $this->success([
            "user" => $user,
            "token" => $user->createToken(`Token for : ` . $user->name, ["user"])->plainTextToken,
        ]);
    }
    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return $this->success("", "logout succefuly", 200);
    }
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return $this->error("", "User not found");
        }
        $token = $user->createToken('password_reset')->plainTextToken;
        $resetLink = 'http://localhost:5173/reset-password?user=' . urlencode($user->email) . '&token=' . $token;

        // Send the reset email
        Mail::to($user)->send(new ForgetPasswordMail($resetLink, $token));

        return $this->success('', 'Password reset email sent successfully.');
    }
    public function resetpassword(Request $request)
    {
        $request->validate([
            "password" => ["required", PasswordRules::default()],
            "token" => "required",
            "email" => "required|email"
        ]);
        $user = User::where("email", $request->email)->first();
        if (!$user) {
            return $this->error("", "User not found");
        }
        // $token = substr($request->token, strpos($request->token, '|') + 1);
        // Log::info("message $token");
        // $hashedToken = hash('sha256', $token); // Hash the provided token
        // $tokenExists = DB::table('personal_access_tokens')
        //     ->where('tokenable_type', User::class)
        //     ->where('tokenable_id', $user->id)
        //     ->where('name', 'sanctum')
        //     ->where('token', $hashedToken)
        //     ->exists();

        // if (!$tokenExists) {
        //     return $this->error("", "Invalid token");
        // }
        $user->password = Hash::make($request->password);
        $user->save();
        return $this->success("", "Passord have been changed");
    }
}
