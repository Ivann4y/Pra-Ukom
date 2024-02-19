<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

Route::middleware('guest')->group(function(){
    Route::view('/signin', 'auth.signin', ['title' => 'Sign In'])->name('signin');
    Route::view('/signup', 'auth.signup', ['title' => 'Sign Up']);
    Route::controller(AuthController::class)->group(function(){
        Route::post('/signup', 'signup');
        Route::post('/signin', 'signin');
    });
});

Route::middleware('auth')->group(function(){
    Route::get('/', [UserController::class, 'index']);
    Route::get('/signout', [AuthController::class, 'signout']);
});