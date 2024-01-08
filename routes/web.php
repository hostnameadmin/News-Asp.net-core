<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client;
use App\Http\Controllers\Service;
use App\Http\Controllers\Cron;

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

    /*
        * Chưa đăng nhập
     */

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

/*
        * Đã đăng nhập
     */
Route::prefix($folder)->middleware('Index')->group(function () {
    Route::get('/{index?}', [Client::class, 'index'])
        ->where('index', '(index)?')
        ->name('home');
    Route::get('service/{category}/{service}', [Service::class, 'service'])->name('service');
    Route::post('service/order', [Service::class, 'order'])->name('order');
    Route::get('cron/order', [Cron::class, 'order'])->name('cron_order');
});
