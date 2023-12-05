<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\web_controller;
use App\Http\Controllers\CVController;
use App\Http\Controllers\GreetController;
use App\Http\Controllers\SendEmailController;

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

Route::get('/public/', function () {
    return view('welcome');
});

Route::get('/public/send-mail', [SendEmailController::class, 'index'])->name('kirim-email');
Route::post('/public/post-email', [SendEmailController::class, 'store'])->name('post-email');

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/public/register', 'register')->name('register');
    Route::post('/public/store', 'store')->name('store');
    Route::get('/public/login', 'login')->name('login');
    Route::post('/public/authenticate', 'authenticate')->name('authenticate');
    Route::get('/public/dashboard', 'dashboard')->name('dashboard');
    Route::post('/public/logout', 'logout')->name('logout');
    Route::get('/public/edit/{id}', 'edit')->name('edit');
    Route::put('/public/edit/{id}', 'update')->name('update');
});

Route::get('/public/greet', [GreetController::class, 'greet'])->name('greet');