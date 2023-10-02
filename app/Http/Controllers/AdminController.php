<?php

namespace App\Http\Controllers;

use App\Http\Resources\UsersResource;
use App\Models\Images;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where("role", "0")->get();
        return UsersResource::collection($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "image" => "required"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return new UsersResource($user);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "username" => "required",
            "email" => "required|email",
            "password" => ["required", Password::default()],
            "image" => "required"
        ]);
        // return response()->json($request);
        $user = User::find($id);
        if (!$user) {
            return $this->error("", "User not found", 404);
        }

        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if ($request->hasFile("image")) {
            $image_path = Str::random() . "." . $request->file("image")->getClientOriginalExtension();
            Storage::putFileAs("images", $request->image, $image_path);
            $user->image = $image_path;
        }
        $user->save();
        return $this->success("", "updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
