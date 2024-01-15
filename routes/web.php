<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Service;
use App\Http\Controllers\Smm;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/*
Code : DVMXH SMM Panel
Version : 1.0
Developer by : anhyeuem37 (https://www.facebook.com/anhyeuem3737)
Sdt : 0922235437
Vui lòng không tự ý sửa code, nếu gặp vấn đề sẽ không được hỗ trợ
*/

Route::get('/', function () {
    return view('welcome');
});

$folder = 'client'; ## Tài khoản
Route::prefix($folder)->middleware('Login')->group(function () {

    /* Chưa đăng nhập */

    ## View
    Route::get('register', [Client::class, 'register'])->name('register');
    Route::get('login', [Client::class, 'login'])->name('login');
    Route::get('reset_password/{token?}', [Client::class, 'reset_password'])->name('reset_password');
    ## Chức năng
    Route::post('register_send', [Client::class, 'register_send'])->name('register_send');
    Route::post('login_send', [Client::class, 'login_send'])->name('login_send');
    Route::post('send_token', [Client::class, 'send_token'])->name('send_token');
    Route::post('new_password', [Client::class, 'new_password'])->name('new_password');
    ## Rào
    Route::get('register_send', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('login_send', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('send_token', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('new_password', function () {
        abort(403, 'Truy cập trái phép');
    });
});

Route::get($folder . '/logout', [Client::class, 'logout'])->name('logout');

/* Đã đăng nhập */

Route::prefix($folder)->middleware('Index')->group(function () {
    Route::get('/{index?}', [Client::class, 'index'])
        ->where('index', '(index)?')
        ->name('home');
    Route::get('service/{category}/{service}', [Service::class, 'service'])->name('service');
    Route::post('service/order', [Service::class, 'order'])->name('order');
    Route::get('history', [Client::class, 'history'])->name('history');
    Route::get('info', [Client::class, 'info'])->name('info');
    Route::get('api', [Client::class, 'api'])->name('api');
    Route::get('banking', [Client::class, 'banking'])->name('banking');
    Route::post('change_token', [Client::class, 'change_token'])->name('change_token');
    Route::post('change_password', [Client::class, 'change_password'])->name('change_password');
    Route::post('option', [Service::class, 'option'])->name('option');
    Route::post('price', [Service::class, 'price'])->name('price');
});

/* Đăng nhập và có quyền ADMIN */
$folder = 'admin';
Route::prefix($folder)->middleware('Admin')->group(function () {
    Route::get('/{index?}', [Admin::class, 'index'])
        ->where('index', '(index)?')
        ->name('admin_index');
    Route::get('smmpanel', [Admin::class, 'smmpanel'])->name('admin_smmpanel');
    Route::post('admin_add_smmpanel', [Admin::class, 'admin_add_smmpanel'])->name('admin_add_smmpanel');
    Route::post('admin_get_services', [Admin::class, 'admin_get_services'])->name('admin_get_services');
});

/* Global - không cần đăng nhập */
Route::get('smm/order', [Smm::class, 'order'])->name('smm_order');
Route::get('smm/status', [Smm::class, 'status'])->name('smm_status');
