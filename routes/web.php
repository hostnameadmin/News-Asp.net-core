<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
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

    Route::get('confirm_register', function () {
        abort(403, 'Truy cập trái phép');
    });

    Route::get('confirm_login', function () {
        abort(403, 'Truy cập trái phép');
    });

    Route::post('confirm_register/', [Client::class, 'confirm_register'],)->name('confirm_register')->middleware('Register_Confirm');
    Route::post('confirm_login/', [Client::class, 'confirm_login'])->name('confirm_login');
    Route::get('logout/', [Client::class, 'logout'])->name('logout');
});
