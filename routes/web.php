<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;

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


Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('pages.login');
    })->name('login');
    Route::get('/registration', [AuthController::class, 'index'])->name('register');
    Route::post('/user-login', [AuthController::class, 'login'])->name('user.login');
    Route::post('/store', [AuthController::class, 'store'])->name('register.store');
});

Route::group(['middleware' => ['auth','user.role']], function () {
    Route::get('/logout', [AuthController::class, 'destroy'])->name('user.logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});