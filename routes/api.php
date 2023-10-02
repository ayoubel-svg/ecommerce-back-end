<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/login", [MainController::class, "login"]);
Route::post("/register", [MainController::class, "register"]);
Route::post("/forgot-password", [MainController::class, "forgotPassword"]);
Route::post("/reset-password", [MainController::class, "resetPassword"]);

Route::group(["middleware" => ["auth:sanctum"]], function () {
    Route::post("/logout", [MainController::class, "logout"]);
    Route::resource("/admin", AdminController::class);
});
Route::resource("/product", ProductController::class);
Route::resource("/category", CategoryController::class);

Route::get('auth', [GoogleController::class, 'login']);
Route::get('auth/callback', [GoogleController::class, 'callback']);
