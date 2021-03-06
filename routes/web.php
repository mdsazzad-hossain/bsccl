<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Configuration\RolePermissionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileImportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Configuration\ServiceController;

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

// Route::get('/{any}', function () {
//     $data = auth()->user();
//         return view('layouts.app',[
//             'data'=>$data
//         ]);
// })->where('any','.*');

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
    Route::get('/d3cfdb7594b592d36a0179aaa03c3480', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/get-user-list', [UserController::class, 'index'])->name('user.list');
    Route::get('/system-user-list', [UserController::class, 'system_user'])->name('system.user.list');
    Route::post('/store', [AuthController::class, 'store'])->name('register.store');

    //File Import
    Route::post('/user-import', [FileImportController::class, 'user_import'])->name('user.import');

    //Role & Permission
    Route::get('/role-permission-list', [RolePermissionController::class, 'index'])->name('role.permission.list');
    Route::post('/store-role-permission', [RolePermissionController::class, 'store'])->name('role.permission.store');

    //Services Routes
    Route::get('/service-list', [ServiceController::class, 'index'])->name('service.list');
    Route::get('/get-service-list', [ServiceController::class, 'get_service'])->name('get.service.list');
    Route::post('/get-sub-service-list', [ServiceController::class, 'get_sub_service'])->name('get.sub.service.list');
    Route::post('/get-capacity-list', [ServiceController::class, 'get_capacity'])->name('get.capacity.list');
    Route::post('/service-store', [ServiceController::class, 'store'])->name('service.store');
    Route::post('/change-service-status', [ServiceController::class, 'destroy'])->name('service.status.change');
    Route::get('/get-iplc-list', [ServiceController::class, 'iplc_list'])->name('service.iplc');
    Route::post('/capacity-update', [ServiceController::class, 'update_capacity'])->name('iplc.capacity.update');
});

