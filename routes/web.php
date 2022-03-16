<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
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

Route::get('/', function () {
    return view('pages.login');
})->name('login');

Route::get('/registration', [AuthController::class, 'index'])->name('register');
Route::post('/user-login', [AuthController::class, 'login'])->name('user.login');
Route::post('/store', [AuthController::class, 'store'])->name('register.store');
Route::get('/dashboard', [AuthController::class, 'index'])->name('index');