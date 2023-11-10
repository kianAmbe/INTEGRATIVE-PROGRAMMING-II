<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

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

// Homepage
Route::get('/', function () {
    return view('login');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('blank_dashboard');
})->middleware(['auth']); 

Route::get('/register', [RegistrationController::class, 'showRegistrationForm']);
Route::post('/register', [RegistrationController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
 
    Route::get('/profile', [ProfileController::class, 'showProfile']);
 
    Route::resource('/profiles', ProfileController::class);
Route::resource('login', LoginController::class)->only(['create', 'store', 'destroy']);
});

// Other routes from auth.php
require __DIR__.'/auth.php';
