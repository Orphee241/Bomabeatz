<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::group([
    "middleware" => "authentikated"
], function () {

    Route::get('/pricing', [ClientController::class, "pricing"])->name("pricing");
    Route::post('/payment', [ClientController::class, "payment"])->name("payment");
    Route::get('/logout', [ClientController::class, "logout"])->name("logout");
    Route::get('/notification', [ClientController::class, "notif"])->name("notification");
    Route::get('/vip', [ClientController::class, "vip"])->name("vip");
});

Route::get('/admin', [ClientController::class, "admin"])->name("admin");
Route::get('/beats', [ClientController::class, "beats"])->name("beats");
Route::get('/categories', [ClientController::class, "categories"])->name("categories");
Route::get('/sellbeat', [ClientController::class, "sellbeat"])->name("sellbeat");
Route::get('/beats', [ClientController::class, "beats"])->name("beats");
Route::get('/', [ClientController::class, "index"])->name("home");

Route::get('/signup', [ClientController::class, "signup"])
->middleware("custom_guest")
->name("signup");

Route::post('/user_signup', [ClientController::class, "user_signup"])->name("user_signup");
Route::get('/login', [ClientController::class, "login"])->name("login");
Route::post('/authentikate', [ClientController::class, "authentikate"])->name("authentikate");
Route::get('/contact', [ClientController::class, "contact"])->name("contact");
Route::get('/about', [ClientController::class, "about"])->name("about");
Route::get('/beat_detail/{id}', [ClientController::class, "beat_detail"])->name("beat_detail");
