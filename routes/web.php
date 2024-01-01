<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client;

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

$folder = 'client';
Route::prefix($folder)->group(function () {

    Route::get('/{index?}', [Client::class, 'index'])
        ->where('index', '(index)?')
        ->name('home')->middleware('Index');

    Route::get('register/', [Client::class, 'register_view'])->name('register')->middleware('Register');
    Route::get('login/', [Client::class, 'login_view'])->name('login')->middleware('Login');
    Route::get('reset_password/{token?}', [Client::class, 'reset_password'])
        ->name('reset_password')
        ->middleware('Reset_Password');

    Route::get('confirm_register', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('confirm_login', function () {
        abort(403, 'Truy cập trái phép');
    });

    Route::post('confirm_register/', [Client::class, 'confirm_register'],)->name('confirm_register')->middleware('Register_Confirm');
    Route::post('confirm_login/', [Client::class, 'confirm_login'],)->name('confirm_login');
    Route::post('confirm_reset_password/', [Client::class, 'confirm_reset_password'])->name('confirm_reset_password');
    Route::post('new_password/', [Client::class, 'new_password'])->name('new_password');
    Route::get('logout/', [Client::class, 'logout'])->name('logout');

    Route::get('services/{services}', [Client::class, 'services'])->name('services')->middleware('Services');
});
