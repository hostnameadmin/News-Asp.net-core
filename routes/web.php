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
    Route::get('ticket', [Client::class, 'ticket'])->name('ticket');
    Route::get('backup', [Client::class, 'backup'])->name('backup');
    Route::post('change_token', [Client::class, 'change_token'])->name('change_token');
    Route::post('change_password', [Client::class, 'change_password'])->name('change_password');
    Route::post('ticket_send', [Client::class, 'ticket_send'])->name('ticket_send');
    Route::post('option', [Service::class, 'option'])->name('option');
    Route::post('price', [Service::class, 'price'])->name('price');
    Route::post('backup_balance', [Client::class, 'backup_balance'])->name('backup_balance');
});

/* Đăng nhập và có quyền ADMIN */
$folder = 'admin';
Route::prefix($folder)->middleware('Admin')->group(function () {
    Route::get('/{index?}', [Admin::class, 'index'])
        ->where('index', '(index)?')
        ->name('admin_index');

    Route::get('smmpanel', [Admin::class, 'smmpanel'])->name('admin_smmpanel');
    Route::get('server', [Admin::class, 'server'])->name('admin_server');
    Route::get('category/{id?}', [Admin::class, 'category'])->name('admin_category');
    Route::get('subcategory', [Admin::class, 'subcategory'])->name('admin_subcategory');
    Route::get('service', [Admin::class, 'service'])->name('admin_service');
    Route::get('order', [Admin::class, 'order'])->name('admin_order');
    Route::get('user', [Admin::class, 'user'])->name('admin_user');
    Route::get('banking', [Admin::class, 'banking'])->name('admin_banking');
    Route::get('transaction', [Admin::class, 'transaction'])->name('admin_transaction');
    Route::get('news', [Admin::class, 'news'])->name('admin_news');

    Route::post('admin_add_smmpanel', [Admin::class, 'admin_add_smmpanel'])->name('admin_add_smmpanel');
    Route::post('admin_add_news', [Admin::class, 'admin_add_news'])->name('admin_add_news');
    Route::post('admin_add_subcategory', [Admin::class, 'admin_add_subcategory'])->name('admin_add_subcategory');
    Route::post('admin_add_service', [Admin::class, 'admin_add_service'])->name('admin_add_service');
    Route::post('admin_get_services', [Admin::class, 'admin_get_services'])->name('admin_get_services');
    Route::post('admin_add_server', [Admin::class, 'admin_add_server'])->name('admin_add_server');
    Route::post('admin_add_category', [Admin::class, 'admin_add_category'])->name('admin_add_category');
    Route::post('admin_add_banking', [Admin::class, 'admin_add_banking'])->name('admin_add_banking');
    Route::post('admin_get_balance', [Admin::class, 'admin_get_balance'])->name('admin_get_balance');
    Route::post('admin_category_change_status', [Admin::class, 'admin_category_change_status'])->name('admin_category_change_status');
    Route::post('admin_delete_category', [Admin::class, 'admin_delete_category'])->name('admin_delete_category');
    Route::post('admin_update_category', [Admin::class, 'admin_update_category'])->name('admin_update_category');
    Route::post('settings', [Admin::class, 'settings'])->name('settings');
});

/* Global - không cần đăng nhập */
Route::get('smm/order', [Smm::class, 'order'])->name('smm_order');
Route::get('smm/status', [Smm::class, 'status'])->name('smm_status');
Route::get('mbbank', [Client::class, 'mbbank'])->name('mbbank');
Route::get('acb', [Client::class, 'acb'])->name('acb');
Route::get('vcb', [Client::class, 'vcb'])->name('vcb');
