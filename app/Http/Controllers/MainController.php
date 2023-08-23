<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
}
