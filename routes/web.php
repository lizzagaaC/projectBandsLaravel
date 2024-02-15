<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get("login", [MainController::class, "login"])->name("login");
Route::post("login", [MainController::class, "loginStore"])->name("login");

Route::get("signup", [MainController::class, "signup"])->name("signup");
Route::post("signup", [MainController::class, "signupStore"])->name("signup");

Route::get("home", [MainController::class, "home"])->name("home")->middleware("auth");
Route::post("home", [MainController::class, "home"])->name("home")->middleware("auth");

Route::get("newInstrument", [MainController::class, "newInstrument"])->name("newInstrument")->middleware("auth");
Route::post("newInstrument", [MainController::class, "createInstrument"])->name("newInstrument")->middleware("auth");

Route::get("logout", [MainController::class, "logout"])->name("logout");

Route::get("forgetPass", [MainController::class, "forgetPass"])->name("forgetPass");
Route::post("sendMail", [MainController::class, "sendMail"])->name("sendMail");

Route::get('/generatePDF', [MainController::class, 'generatePDF'])->name('generatePDF');