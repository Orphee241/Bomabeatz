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


Route::get('/', [ClientController::class, "index"])->name("home");
Route::get('/admin', [ClientController::class, "admin"])->name("admin");
Route::get('/beats', [ClientController::class, "beats"])->name("beats");
Route::get('/categories', [ClientController::class, "categories"])->name("categories");
Route::get('/vip', [ClientController::class, "vip"])->name("vip");
Route::get('/sellbeat', [ClientController::class, "sellbeat"])->name("sellbeat");
Route::get('/signup', [ClientController::class, "signup"])->name("signup");
Route::get('/login', [ClientController::class, "login"])->name("login");
Route::get('/contact', [ClientController::class, "contact"])->name("contact");
Route::get('/about', [ClientController::class, "about"])->name("about");
