<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client;
use App\Http\Controllers\Services;

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
Route::prefix($folder)->group(function () {

    Route::get('/{index?}', [Client::class, 'index'])
        ->where('index', '(index)?')
        ->name('home')->middleware('Index');

    ## View
    Route::get('register', [Client::class, 'register'])->name('register')->middleware('Login');
    Route::get('login', [Client::class, 'login'])->name('login')->middleware('Login');
    Route::get('reset_password/{token?}', [Client::class, 'reset_password'])->name('reset_password')->middleware('Login');
    ## Chức năng
    Route::get('logout', [Client::class, 'logout'])->name('logout');
    Route::post('register_send', [Client::class, 'register_send'])->name('register_send')->middleware('Login');
    Route::post('login_send', [Client::class, 'login_send'])->name('login_send')->middleware('Login');
    Route::post('send_token', [Client::class, 'send_token'])->name('send_token')->middleware('Login');
    Route::post('new_password', [Client::class, 'new_password'])->name('new_password')->middleware('Login');
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

$folder = 'services'; ## Dịch vụ
Route::prefix($folder)->group(function () {
    Route::get('test', [Services::class, 'test'])->name('test')->middleware('Login');
});
