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



Route::get('/admin', [ClientController::class, "admin"])->name("admin");
Route::get('/beats', [ClientController::class, "beats"])->name("beats");
Route::get('/categories', [ClientController::class, "categories"])->name("categories");
Route::get('/vip', [ClientController::class, "vip"])->name("vip");
Route::get('/sellbeat', [ClientController::class, "sellbeat"])->name("sellbeat");
Route::get('/pricing', [ClientController::class, "pricing"])->name("pricing");
Route::post('/payment', [ClientController::class, "payment"])->name("payment");
Route::get('/notification', [ClientController::class, "notif"])->name("notification");
Route::get('/beats', [ClientController::class, "beats"])->name("beats");
Route::get('/logout', [ClientController::class, "logout"])->name("logout");


Route::get('/', [ClientController::class, "index"])
    ->middleware("guest")
    ->name("home");

Route::get('/signup', [ClientController::class, "signup"])
    ->middleware("guest")
    ->name("signup");

Route::post('/user_signup', [ClientController::class, "user_signup"])
    ->middleware("guest")
    ->name("user_signup");

Route::get('/login', [ClientController::class, "login"])
    ->middleware("guest")
    ->name("login");

Route::post('/authentikate', [ClientController::class, "authentikate"])
    ->middleware("guest")
    ->name("authentikate");

Route::get('/contact', [ClientController::class, "contact"])
    ->middleware("guest")
    ->name("contact");
Route::get('/about', [ClientController::class, "about"])
    ->middleware("guest")
    ->name("about");
